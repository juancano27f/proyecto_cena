<?php

namespace App\Filament\Resources\TripServices\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TripServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('trip_id')
                    ->relationship('trip', 'title')
                    ->required(),
                Select::make('provider_id')
                    ->relationship('provider', 'name')
                    ->required(),
                TextInput::make('service_name')
                    ->required(),
                TextInput::make('cost')
                    ->numeric()
                    ->prefix('$'),
                Textarea::make('details')
                    ->columnSpanFull(),
            ]);
    }
}
