<?php

namespace App\Repository\v1;

use App\Models\FavoriteImage;
use App\Repository\v1\Interfaces\ImageRepositoryInterface;

class ImageRepository implements ImageRepositoryInterface
{

    public function saveFavoriteImage($userId, $myImageId, $imageType, $apiImageUrl)
    {
        if ($imageType === "myImage") {
            $favoriteImage = FavoriteImage::where([['user_id', $userId], ['my_image_id', $myImageId]])->firstOrNew();
            $favoriteImage->user_id = $userId;
            $favoriteImage->my_image_id = $myImageId;
            $favoriteImage->image_type = "myImage";
            $favoriteImage->save();
            return $favoriteImage;
        } else if ($imageType === "api") {
            $favoriteImage = FavoriteImage::where([['user_id', $userId], ['api_image_url', $apiImageUrl]])->firstOrNew();
            $favoriteImage->user_id = $userId;
            $favoriteImage->api_image_url = $myImageId;
            $favoriteImage->image_type = "api";
            $favoriteImage->save();
            return $favoriteImage;
        } else {
            return null;
        }

    }

    public function deleteFavoriteImage(FavoriteImage $favoriteImage)
    {
        $favoriteImage->delete();
    }
}
