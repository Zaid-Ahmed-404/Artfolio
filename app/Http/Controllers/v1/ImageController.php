<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Services\v1\Interfaces\ImageServicesInterface;
use Illuminate\Http\Request;
use App\Models\FavoriteImage;
class ImageController extends Controller
{
    //

    private $imageServicesInterface;
    public function __construct(ImageServicesInterface $imageServicesInterface)
    {
        $this->imageServicesInterface = $imageServicesInterface;
    }
    public function saveFavoriteImage($userId, $myImageId, $imageType, $apiImageUrl)
    {
        return $this->imageServicesInterface->saveFavoriteImage($userId, $myImageId, $imageType, $apiImageUrl);
    }

    public function deleteFavoriteImage(FavoriteImage $favoriteImage)
    {
        return $this->imageServicesInterface->deleteFavoriteImage($favoriteImage);
    }

}
