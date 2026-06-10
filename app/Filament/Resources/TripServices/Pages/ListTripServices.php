<?php

namespace App\Filament\Resources\TripServices\Pages;

use App\Filament\Resources\TripServices\TripServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTripServices extends ListRecords
{
    protected static string $resource = TripServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
