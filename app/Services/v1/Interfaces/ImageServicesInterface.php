<?php

namespace App\Services\v1\Interfaces;

use App\Models\FavoriteImage;
interface ImageServicesInterface
{
    public function saveFavoriteImage($userId, $myImageId, $imageType, $apiImageUrl);
    public function deleteFavoriteImage(FavoriteImage $favoriteImage);
}
