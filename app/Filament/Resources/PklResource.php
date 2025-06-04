<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PklResource\Pages;
use App\Models\Pkl;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Exports\PklExport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Tables\Actions\Action;

class PklResource extends Resource
{
    protected static ?string $model = Pkl::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('siswa_id')
                    ->label('Nama Siswa')
                    ->options(\App\Models\Siswa::all()->pluck('nama', 'id'))
                    ->required(),
                Forms\Components\Select::make('industri_id')
                    ->label('Nama Industri')
                    ->options(\App\Models\Industri::all()->pluck('nama', 'id'))
                    ->required(),
                Forms\Components\Select::make('guru_id')
                    ->label('Guru Pembimbing')
                    ->options(\App\Models\Guru::all()->pluck('nama', 'id'))
                    ->required(),
                Forms\Components\DatePicker::make('mulai')
                    ->required(),
                Forms\Components\DatePicker::make('selesai')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa.nama')
                    ->label('Nama Siswa')
                    ->sortable(),

                Tables\Columns\TextColumn::make('industri.nama')
                    ->label('Nama Industri')
                    ->sortable(),

                Tables\Columns\TextColumn::make('guru.nama')
                    ->label('Guru Pembimbing')
                    ->sortable(),
                Tables\Columns\TextColumn::make('mulai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('selesai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
                                } catch (\Throwable $e) {
                                    $gagal++;
                                    continue;
                                }
                            }

                            \Filament\Notifications\Notification::make()
                                ->title('Bulk Delete Selesai')
                                ->body("Berhasil dihapus: {$berhasil}, Gagal: {$gagal}.")
                                ->color($gagal > 0 ? 'warning' : 'success')
                                ->send();
                        }),
                ]),
            ])
            ->headerActions([
                Action::make('export')
                    ->label('Export Excel')
                    ->color('success')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function () {
                        $fileName = 'data_pkl.xlsx';
                        Excel::store(new PklExport, $fileName, 'public');
                        return response()->download(storage_path("app/public/{$fileName}"));
                    }),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePkls::route('/'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return 'PKL Roster';
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Pkl::count();
    }
}
