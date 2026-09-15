<?php

namespace App\Filament\Resources\Trips\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;
use App\Models\Student;

class TripForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('institution_id')
                    ->label('Institución')
                    ->relationship('institution', 'name')
                    ->required()
                    ->live(),
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
                    ->getOptionLabelFromRecordUsing(
             fn ($record) => $record->first_name . ' ' . $record->last_name
        )
                    ->options(function (Get $get) {
                $institutionId = $get('institution_id');

            if (!$institutionId) {
                return [];
            }

            return Student::query()
                    ->where('institution_id', $institutionId)
                    ->get()
                    ->mapWithKeys(fn ($student) => [
                $student->id => $student->first_name . ' ' . $student->last_name
            ]);
    })
    ->searchable()
    ->preload()
    ->helperText('Solo aparecen estudiantes de la institución seleccionada'),
        ]);
    }
}
