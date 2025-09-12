<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'admin' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('roles', fn(Builder $query) => $query->where('name', 'admin'))),
            'applicant' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('roles', fn(Builder $query) => $query->where('name', 'applicant'))),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
