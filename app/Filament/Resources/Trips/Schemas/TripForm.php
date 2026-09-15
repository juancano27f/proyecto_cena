<?php

namespace App\Filament\Resources\Trips\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TripForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('institution_id')
                    ->relationship('institution', 'name')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->required(),
                TextInput::make('budget')
                    ->numeric(),
                Select::make('status')
                    ->label('Estado')
                    ->options([
                      'planned' => 'Planificado',
                      'in_progress' => 'En curso',
                      'finished' => 'Finalizado',
                      'cancelled' => 'Cancelado',
                      ])
                    ->required()
                    ->default('planned'),
                    
                Select::make('students')
                    ->label('Estudiantes')
                    ->multiple()
                    ->relationship('students', 'first_name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->first_name . ' ' . $record->last_name)
                    ->searchable()
                    ->preload()
                    ->helperText('Selecciona los estudiantes que van en este viaje'),
            ]);
    }
}
