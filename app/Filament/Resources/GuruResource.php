<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Models\Guru;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\QueryException;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GuruImport;
use Filament\Tables\Actions\Action;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required()->maxLength(100),
                Forms\Components\TextInput::make('nip')->required()->maxLength(100),
                Forms\Components\Select::make('gender')->label('Gender')->options([
                    'L' => 'Laki-laki',
                    'P' => 'Perempuan',
                ]),
                Forms\Components\Textarea::make('alamat')->required()->columnSpanFull(),
                Forms\Components\TextInput::make('kontak')->required()->maxLength(20),
                Forms\Components\TextInput::make('email')->email()->required()->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('nip')->searchable(),
                Tables\Columns\BadgeColumn::make('gender')->label('Gender')->colors([
                    'info' => 'L',
                    'danger' => 'P',
                ]),
                Tables\Columns\TextColumn::make('alamat')->searchable(),
                Tables\Columns\TextColumn::make('kontak')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->action(function ($record) {
                        try {
                            $record->delete();
                            Notification::make()->title('Berhasil menghapus')->body('Guru berhasil dihapus.')->success()->send();
                        } catch (QueryException $e) {
                            Notification::make()->title('Gagal menghapus')->body('Guru ini sedang digunakan dalam data lain dan tidak bisa dihapus.')->danger()->send();
                            return;
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                try {
                                    $record->delete();
                                } catch (QueryException $e) {
                                    Notification::make()->title('Gagal menghapus salah satu guru')->body('Beberapa guru sedang digunakan dalam data lain dan tidak bisa dihapus.')->danger()->send();
                                    return;
                                }
                            }

                            Notification::make()->title('Berhasil menghapus')->body('Semua guru berhasil dihapus.')->success()->send();
                        }),
                ]),
            ])
            ->headerActions([
                Action::make('Import CSV')
                    ->label('Import CSV')
                    ->color('success')
                    ->icon('heroicon-o-arrow-up-tray')
                    ->form([
                        FileUpload::make('file')
                            ->label('Pilih CSV')
                            ->acceptedFileTypes(['text/csv', 'text/plain', 'application/vnd.ms-excel'])
                            ->disk('public')
                            ->directory('uploads')
                            ->required(),
                    ])
                    ->action(function (array $data) {
                        $filePath = storage_path('app/public/' . $data['file']);
                        Excel::import(new GuruImport, $filePath);
                        Storage::disk('public')->delete($data['file']);

                        Notification::make()->title('Data guru berhasil diimpor!')->success()->send();
                    })
                    ->visible(fn () => auth()->user()->hasRole('super_admin')),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGurus::route('/'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return 'Teacher Roster';
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Guru::count();
    }
}
