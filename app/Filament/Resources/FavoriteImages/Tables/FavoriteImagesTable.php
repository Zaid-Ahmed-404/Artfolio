<?php

namespace App\Filament\Resources\FavoriteImages\Tables;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\Layout\Grid;
class FavoriteImagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Grid::make(1)
                    ->schema([
                        ImageColumn::make('image')
                            ->label('Image')
                            ->height(150)
                            ->square()
                            ->getStateUsing(function ($record) {
                                if ($record->image_type === 'myImage') {
                                    return $record->myImage?->image;
                                } elseif ($record->image_type === 'api') {
                                    return $record->api_image_url;
                                }
                                return null;
                            })
                            ->extraImgAttributes(['class' => 'w-full rounded'])
                    ]),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                // EditAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
