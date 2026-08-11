<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
   protected function getStats(): array
{
    return [
        Stat::make('Viajes', \App\Models\Trip::count())
            ->description('Total de viajes')
            ->descriptionIcon('heroicon-o-globe-alt')
            ->color('success'),

        Stat::make('Estudiantes', \App\Models\Student::count())
            ->description('Total de estudiantes')
            ->descriptionIcon('heroicon-o-academic-cap')
            ->color('info'),

        Stat::make('Instituciones', \App\Models\Institution::count())
            ->description('Total de instituciones')
            ->descriptionIcon('heroicon-o-building-library')
            ->color('warning'),

        Stat::make('Usuarios', \App\Models\User::count())
            ->description('Total de usuarios')
            ->descriptionIcon('heroicon-o-users')
            ->color('primary'),
    ];
}
}
