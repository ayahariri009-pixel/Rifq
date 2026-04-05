<?php

namespace App\Filament\Widgets;

use App\Models\Animal;
use App\Models\AdoptionRequest;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('إجمالي الحيوانات', Animal::count())
                ->description('جميع الحيوانات المسجلة')
                ->descriptionIcon('heroicon-m-heart')
                ->color('success')
                ->chart([
                    Animal::whereDate('created_at', '>=', now()->subDays(7))->count(),
                    Animal::whereDate('created_at', '>=', now()->subDays(6))->count(),
                    Animal::whereDate('created_at', '>=', now()->subDays(5))->count(),
                    Animal::whereDate('created_at', '>=', now()->subDays(4))->count(),
                    Animal::whereDate('created_at', '>=', now()->subDays(3))->count(),
                    Animal::whereDate('created_at', '>=', now()->subDays(2))->count(),
                    Animal::whereDate('created_at', '>=', now()->subDays(1))->count(),
                ]),
            
            Stat::make('متاحة للتبني', Animal::where('status', 'available_for_adoption')->count())
                ->description('حيوانات جاهزة للتبني')
                ->descriptionIcon('heroicon-m-home')
                ->color('info'),
            
            Stat::make('طلبات التبني', AdoptionRequest::count())
                ->description(AdoptionRequest::where('status', 'pending')->count() . ' قيد المراجعة')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('warning'),
            
            Stat::make('المستخدمين', User::count())
                ->description('إجمالي المستخدمين المسجلين')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),
        ];
    }
    
    protected function getColumns(): int
    {
        return 2;
    }
}
