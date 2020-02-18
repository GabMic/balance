<?php


namespace App\Http\Traits;


use Illuminate\Support\Facades\Auth;

trait UploadImage
{
    /**
     * @param $image
     * @return string
     */
    public static function upload($image)
    {

        $clientOriginalName = $image->getClientOriginalName();

        $id = Auth::id();
        $image->storeAs('/public/bills/' . $id, $clientOriginalName);
        return '/storage/bills/' . $id . '/' . $clientOriginalName;

    }
}
