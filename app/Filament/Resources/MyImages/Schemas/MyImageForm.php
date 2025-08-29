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
                    ->disk('public')
                    ->image()
                    ->maxSize(6144)
                    ->directory('images')
                    ->saveUploadedFileUsing(function ($file) {
                        $path = Storage::disk('public')->putFile('images', $file);
                        return asset('storage/' . $path);
                    })->required()

            ]);
    }
}
