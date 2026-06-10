<?php

namespace App\Filament\Resources\TripServices\Pages;

use App\Filament\Resources\TripServices\TripServiceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTripService extends EditRecord
{
    protected static string $resource = TripServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
