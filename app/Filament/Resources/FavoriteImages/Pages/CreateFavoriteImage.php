<?php

namespace App\Filament\Resources\FavoriteImages\Pages;

use App\Filament\Resources\FavoriteImages\FavoriteImageResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFavoriteImage extends CreateRecord
{
    protected static string $resource = FavoriteImageResource::class;
}
