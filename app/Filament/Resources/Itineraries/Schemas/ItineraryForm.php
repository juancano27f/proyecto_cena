<?php

namespace App\Filament\Resources\Itineraries\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ItineraryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('trip_id')
                    ->relationship('trip', 'title')
                    ->required(),
                DatePicker::make('date')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                Textarea::make('activities')
                    ->columnSpanFull(),
            ]);
    }
}
