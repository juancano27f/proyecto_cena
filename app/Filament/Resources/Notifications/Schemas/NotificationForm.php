<?php

namespace App\Filament\Resources\Notifications\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class NotificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('trip_id')
                    ->relationship('trip', 'title')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_read')
                    ->required(),
            ]);
    }
}
