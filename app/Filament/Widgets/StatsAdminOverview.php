<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::query()->count())
                ->description('All users from the database')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 100, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Employees', Employee::query()->count())
                ->description('All employees from this website')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Department', Department::query()->count())
                ->description('All department')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}
