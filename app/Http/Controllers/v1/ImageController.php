<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Services\v1\Interfaces\ImageServicesInterface;
use Illuminate\Http\Request;
use App\Models\FavoriteImage;
class ImageController extends Controller
{
    //
    public function saveFavoriteImage($userId, $myImageId, $imageType, $apiImageUrl, $apiTitle = null, $apiDescription = null)
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
            $favoriteImage->api_image_url = $apiImageUrl;
            $favoriteImage->image_type = "api";
            $favoriteImage->api_title = $apiTitle;
            $favoriteImage->api_description = $apiDescription;
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
