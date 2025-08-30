<?php

namespace App\Filament\Resources\FavoriteImages\Pages;

use App\Filament\Resources\FavoriteImages\FavoriteImageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFavoriteImage extends EditRecord
{
    protected static string $resource = FavoriteImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
