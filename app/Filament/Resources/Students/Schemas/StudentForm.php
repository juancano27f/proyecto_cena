<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('institution_id')
                    ->relationship('institution', 'name')
                    ->required(),
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                DatePicker::make('birth_date'),
                TextInput::make('guardian_name'),
                TextInput::make('guardian_phone')
                    ->tel(),
            ]);
    }
}
