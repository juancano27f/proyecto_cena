<?php

namespace App\Filament\Resources\Documents\Schemas;

use App\Models\Student;
use App\Models\Trip;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class DocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('trip_id')
                    ->label('Viaje')
                    ->relationship('trip', 'title')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->live()
                    ->helperText('Elige primero el viaje'),

                Select::make('student_id')
                    ->label('Estudiante (opcional)')
                    ->options(function (Get $get) {
                        $tripId = $get('trip_id');

                        if (!$tripId) {
                            return [];
                        }

                        $trip = Trip::find($tripId);

                        if (!$trip) {
                            return [];
                        }

                        return Student::query()
                            ->where('institution_id', $trip->institution_id)
                            ->get()
                            ->mapWithKeys(fn ($student) => [
                                $student->id => $student->first_name . ' ' . $student->last_name
                            ]);
                    })
                    ->searchable()
                    ->preload()
                    ->helperText('Si el documento es de un alumno, elígelo. Si es del viaje completo, déjalo vacío.'),

                FileUpload::make('file_path')
                    ->label('Archivo')
                    ->directory('documents')
                    ->acceptedFileTypes([
                        'application/pdf',
                        'image/jpeg',
                        'image/png',
                    ])
                    ->downloadable()
                    ->openable()
                    ->required(),

                Select::make('type')
                    ->label('Tipo de documento')
                    ->options([
                        'permission' => 'Permiso de padres',
                        'id' => 'Documento de identidad',
                        'medical' => 'Certificado médico',
                        'other' => 'Otro',
                    ])
                    ->required(),
            ]);
    }
}