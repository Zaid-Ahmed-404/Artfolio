<?php

namespace App\Filament\Resources\MyImages\Schemas;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MyImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make("title")->required(),
                TextInput::make("description")->required(),
                FileUpload::make('image')
                    ->image()
                    ->maxSize(6144)
                    ->directory('images')
                    ->required()

            ]);
    }
}
