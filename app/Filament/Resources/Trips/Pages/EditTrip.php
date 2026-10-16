<?php

namespace App\Filament\Resources\Trips\Pages;

use App\Filament\Resources\Trips\TripResource;
use App\Models\Flight;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTrip extends EditRecord
{
    protected static string $resource = TripResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!empty($data['flight_id'])) {
            $flight = Flight::find($data['flight_id']);

            if ($flight && $flight->departure_date) {
                $data['start_date'] = $flight->departure_date;
                $data['end_date'] = $flight->departure_date;
            }
        }

        return $data;
    }
}