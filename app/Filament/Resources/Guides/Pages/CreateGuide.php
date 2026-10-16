<?php

namespace App\Filament\Resources\Guides\Pages;

use App\Filament\Resources\Guides\GuideResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGuide extends CreateRecord
{
    protected static string $resource = GuideResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['service_type'] = 'Guía turístico';

        return $data;
    }
}