<?php

namespace App\Filament\Resources\Documents\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('trip_id')
                    ->relationship('trip', 'title')
                    ->required(),
                Select::make('student_id')
                    ->relationship('student', 'id'),
                TextInput::make('file_path')
                    ->required(),
                TextInput::make('type'),
            ]);
    }
}
