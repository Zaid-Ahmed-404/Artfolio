<?php

namespace App\Filament\Resources\MyImages\Pages;

use App\Filament\Resources\MyImages\MyImageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMyImage extends EditRecord
{
    protected static string $resource = MyImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
