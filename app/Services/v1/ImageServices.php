<?php

namespace App\Services\v1;

use App\Repository\v1\Interfaces\ImageRepositoryInterface;
use App\Services\v1\Interfaces\ImageServicesInterface;

use App\Models\FavoriteImage;
class ImageServices implements ImageServicesInterface
{
    private $imageRepositoryInterface;
    public function __construct(ImageRepositoryInterface $imageRepositoryInterface, )
    {
        $this->imageRepositoryInterface = $imageRepositoryInterface;
    }
    public function saveFavoriteImage($userId, $myImageId, $imageType, $apiImageUrl)
    {
        return $this->imageRepositoryInterface->saveFavoriteImage($userId, $myImageId, $imageType, $apiImageUrl);
    }

    public function deleteFavoriteImage(FavoriteImage $favoriteImage)
    {
        return $this->imageRepositoryInterface->deleteFavoriteImage($favoriteImage);
    }
}
