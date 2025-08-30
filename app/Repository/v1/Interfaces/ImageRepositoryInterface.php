<?php
namespace App\Repository\v1\Interfaces;
use App\Models\FavoriteImage;

interface ImageRepositoryInterface
{
    public function saveFavoriteImage($userId, $myImageId, $imageType, $apiImageUrl);
    public function deleteFavoriteImage(FavoriteImage $favoriteImage);
}
