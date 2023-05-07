<?php

namespace App\Filament\Resources\SetoranResource\Pages;

use App\Filament\Resources\SetoranResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSetoran extends CreateRecord
{
    protected static string $resource = SetoranResource::class;
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
