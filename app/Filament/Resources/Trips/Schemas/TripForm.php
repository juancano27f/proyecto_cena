<?php

namespace App\Filament\Resources\Trips\Schemas;

use App\Models\Flight;
use App\Models\Student;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

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
                    ->live()
                    ->default(fn () => auth()->user()?->isRector() ? auth()->user()->institution_id : null)
                    ->disabled(fn () => auth()->user()?->isRector())
                    ->dehydrated(),

                TextInput::make('teacher_name')
                    ->label('Profesor responsable')
                    ->required(),

                TextInput::make('title')
                    ->label('Título del viaje')
                    ->required(),

                Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),

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

                Select::make('flight_id')
                    ->label('Paquete / Vuelo disponible')
                    ->relationship(
                        name: 'flight',
                        titleAttribute: 'destination',
                        modifyQueryUsing: fn ($query) => $query->where('status', 'available')
                    )
                    ->getOptionLabelFromRecordUsing(function ($record) {
                        $fecha = $record->departure_date
                            ? $record->departure_date->format('d/m/Y')
                            : 'Sin fecha';

                        return $record->origin . ' → ' . $record->destination . ' | ' . $record->airline . ' | ' . $fecha;
                    })
                    ->searchable()
                    ->preload()
                    ->required()
                    ->helperText('Al elegir el paquete se usan su fecha, precio y recorrido'),

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