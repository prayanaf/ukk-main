<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SiswaImport;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function getNavigationBadge(): ?string
    {
        return (string) Siswa::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('nis')
                    ->label('NIS')
                    ->required()
                    ->maxLength(10),
                Forms\Components\Select::make('gender')
                    ->label('Gender')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('kontak')
                    ->label('Kontak (+62)')
                    ->prefix('+62')
                    ->required()
                    ->maxLength(13)
                    ->rule('regex:/^[0-9]{9,13}$/')
                    ->afterStateHydrated(function ($component, $state) {
                        if (str_starts_with($state, '+62')) {
                            $component->state(substr($state, 3));
                        }
                    })
                    ->dehydrateStateUsing(function ($state) {
                        return '+62' . ltrim($state, '0');
                    }),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(100),
                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->directory('foto_siswa'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('nis')->searchable(),
                Tables\Columns\BadgeColumn::make('gender')
                    ->label('Gender')
                    ->colors([
                        'info' => 'L',
                        'danger' => 'P',
                    ]),
                Tables\Columns\TextColumn::make('kontak')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\IconColumn::make('status_lapor_pkl')
                    ->label('Status PKL')
                    ->boolean(),
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->circular(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->hidden(fn($record) => $record->pkls()->exists())
                    ->disabled(fn($record) => $record->pkls()->exists()),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('delete')
                    ->label('Hapus Terpilih')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->action(function (\Illuminate\Support\Collection $records) {
                        $deletedCount = 0;

                        foreach ($records as $record) {
                            try {
                                if (!$record->pkls()->exists()) {
                                    $record->delete();
                                    $deletedCount++;
                                }
                            } catch (\Exception $e) {
                                Notification::make()
                                    ->title('Gagal menghapus beberapa data siswa')
                                    ->body('Beberapa siswa memiliki data PKL yang masih terhubung.')
                                    ->danger()
                                    ->send();
                            }
                        }

                        if ($deletedCount > 0) {
                            Notification::make()
                                ->title("Berhasil menghapus $deletedCount siswa.")
                                ->success()
                                ->send();
                        }
                    })
                    ->deselectRecordsAfterCompletion(),
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
                        Excel::import(new SiswaImport, $filePath);
                        Storage::disk('public')->delete($data['file']);

                        Notification::make()
                            ->title('Data siswa berhasil diimpor!')
                            ->success()
                            ->send();
                    })
                    ->visible(fn () => auth()->user()->hasRole('super_admin')),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSiswas::route('/'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return 'Student Roster';
    }
}
