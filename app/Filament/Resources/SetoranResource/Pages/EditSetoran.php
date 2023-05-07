<?php

namespace App\Filament\Resources\SetoranResource\Pages;

use App\Filament\Resources\SetoranResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSetoran extends EditRecord
{
    protected static string $resource = SetoranResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}


}
