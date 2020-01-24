<?php


namespace App\Http\Traits;


trait UploadImage
{
    /**
     * @param $image
     * @return string
     */
    public static function upload($image){

        $clientOriginalName = $image->getClientOriginalName();

        $id = auth()->user()->id;
        $image->storeAs('/public/bills/'. $id, $clientOriginalName);
        return '/storage/bills/'. $id . '/'. $clientOriginalName;

    }
}
