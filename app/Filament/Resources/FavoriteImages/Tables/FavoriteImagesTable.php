<?php

namespace App\Filament\Resources\FavoriteImages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
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
                            ->extraImgAttributes(['class' => 'w-full rounded']),
                        TextColumn::make('title')->getStateUsing(function ($record) {
                            if ($record->image_type === 'myImage') {
                                return $record->myImage?->title;
                            } elseif ($record->image_type === 'api') {
                                return $record->api_title;
                            }
                            return null;
                        }),
                        TextColumn::make('description')->getStateUsing(function ($record) {
                            if ($record->image_type === 'myImage') {
                                return $record->myImage?->description;
                            } elseif ($record->image_type === 'api') {
                                return $record->api_description;
                            }
                            return null;
                        })
                    ]),

            ])
            ->contentGrid([
                'md' => 3,
            ])->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                DeleteAction::make()
                    ->icon('heroicon-s-heart')
                    ->label('Un-Favorite'),

            ])
            ->toolbarActions([

            ]);
    }
}
