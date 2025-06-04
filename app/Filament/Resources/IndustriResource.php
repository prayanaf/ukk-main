<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndustriResource\Pages;
use App\Models\Industri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\QueryException;
use Filament\Notifications\Notification;

class IndustriResource extends Resource
{
    protected static ?string $model = Industri::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(100)
                    ->unique(ignoreRecord: true)
                    ->label('Nama Industri'),
                Forms\Components\TextInput::make('bidang_usaha')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('kontak')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('website')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('bidang_usaha')->searchable(),
                Tables\Columns\TextColumn::make('kontak')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('website')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->action(function ($record) {
                        try {
                            $record->delete();
                            Notification::make()->title('Berhasil menghapus')->body('Industri berhasil dihapus.')->success()->send();
                        } catch (QueryException $e) {
                            Notification::make()->title('Gagal menghapus')->body('Industri ini sedang digunakan dalam data PKL dan tidak bisa dihapus.')->danger()->send();
                            return;
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->action(function ($records) {
                            $berhasil = 0;
                            $gagal = 0;

                            foreach ($records as $record) {
                                try {
                                    $record->delete();
                                    $berhasil++;
                                } catch (QueryException $e) {
                                    $gagal++;
                                }
                            }

                            Notification::make()
                                ->title('Bulk Delete Selesai')
                                ->body("Industri berhasil dihapus: {$berhasil}, gagal dihapus: {$gagal}.")
                                ->color($gagal > 0 ? 'warning' : 'success')
                                ->send();
                        }),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageIndustris::route('/'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return 'Industry Roster';
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Industri::count();
    }
}
