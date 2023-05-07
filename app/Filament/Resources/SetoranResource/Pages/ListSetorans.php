<?php

namespace App\Filament\Resources\SetoranResource\Pages;

use App\Filament\Resources\SetoranResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSetorans extends ListRecords
{
    protected static string $resource = SetoranResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
        return [
            
            FilamentExportBulkAction::make('Export'),
            
        ];
    }
}
