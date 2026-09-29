<?php

namespace App\Filament\Resources\Students\Pages;

use App\Filament\Resources\Students\StudentResource;
use App\Models\Institution;
use App\Models\Student;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\ListRecords;
use Filament\Notifications\Notification;

class ListStudents extends ListRecords
{
    protected static string $resource = StudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),

            Action::make('bulkCreate')
                ->label('Carga masiva')
                ->icon('heroicon-o-users')
                ->form([
                    Select::make('institution_id')
                        ->label('Institución')
                        ->options(Institution::query()->pluck('name', 'id'))
                        ->required()
                        ->default(fn () => auth()->user()?->isRector()
                            ? auth()->user()->institution_id
                            : null)
                        ->disabled(fn () => auth()->user()?->isRector())
                        ->dehydrated(),

                    Textarea::make('students')
                        ->label('Estudiantes')
                        ->rows(10)
                        ->required()
                        ->helperText('Una línea por estudiante. Formato: Nombre Apellido, documento, grado'),
                ])
                ->action(function (array $data) {
                    $lines = preg_split('/\r\n|\r|\n/', $data['students']);
                    $count = 0;

                    foreach ($lines as $line) {
                        $line = trim($line);

                        if ($line === '') {
                            continue;
                        }

                        $parts = array_map('trim', explode(',', $line));
                        $fullName = $parts[0] ?? '';
                        $nameParts = explode(' ', $fullName, 2);

                        Student::create([
                            'institution_id' => $data['institution_id'],
                            'first_name' => $nameParts[0] ?? 'SinNombre',
                            'last_name' => $nameParts[1] ?? '',
                            'document_number' => $parts[1] ?? null,
                            'grade' => $parts[2] ?? null,
                        ]);

                        $count++;
                    }

                    Notification::make()
                        ->title("Se crearon {$count} estudiantes")
                        ->success()
                        ->send();
                }),
        ];
    }
}