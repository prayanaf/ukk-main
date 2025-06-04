<?php

namespace App\Filament\Resources\IndustriResource\Pages;

use App\Filament\Resources\IndustriResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRecords;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;

class ManageIndustris extends ManageRecords
{
    protected static string $resource = IndustriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Add New Industri'),
        ];
    }

    public function getTitle(): string
    {
        return 'Industries List';
    }

    protected function getTableActions(): array
    {
        return [
            DeleteAction::make()
                ->before(function ($record) {
                    if ($record->pkls()->exists()) {
                        Notification::make()
                            ->title('Gagal Menghapus')
                            ->body('Industri ini sudah digunakan oleh data PKL.')
                            ->danger()
                            ->send();

                        return false; // batal hapus
                    }
                }),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make()
                ->before(function ($records) {
                    $used = $records->filter(fn ($record) => $record->pkls()->exists());

                    if ($used->isNotEmpty()) {
                        Notification::make()
                            ->title('Sebagian Gagal Dihapus')
                            ->body('Beberapa industri telah digunakan di data PKL.')
                            ->danger()
                            ->send();

                        return false; // batal hapus massal
                    }
                }),
        ];
    }
}
