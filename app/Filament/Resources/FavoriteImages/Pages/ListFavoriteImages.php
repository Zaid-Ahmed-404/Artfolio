<?php

namespace App\Filament\Resources\FavoriteImages\Pages;

use App\Filament\Resources\FavoriteImages\FavoriteImageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFavoriteImages extends ListRecords
{
    protected static string $resource = FavoriteImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
