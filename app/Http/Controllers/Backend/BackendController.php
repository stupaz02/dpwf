<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    protected $limit = 5;
    protected $uploadPath;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check-permission');
        
        $this->uploadPath = public_path(config('cms.image.directory'));
        $this->filesuploadPath = public_path(config('cms.image.files'));
    }

    public function removeImage($image)
    {
        if(! empty($image))
        {
            $imagePath     = $this->uploadPath . '/' . $image;
            $ext           = substr(strrchr($image, '.'), 1);
            $thumbnail     = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            $thumbnailPath = $this->uploadPath . '/' . $thumbnail;

            if (file_exists($imagePath)) unlink($imagePath);
            if (file_exists($thumbnailPath)) unlink($thumbnailPath);
        }
    }


    public function removeFile($file)
    {
        if(! empty($file))
        {
            $filePath     = $this->filesuploadPath . '/' . $file;
            $ext           = substr(strrchr($file, '.'), 1);
            // $thumbnail     = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            // $thumbnailPath = $this->uploadPath . '/' . $thumbnail;

            if (file_exists($filePath)) unlink( $filePath);
            // if (file_exists($thumbnailPath)) unlink($thumbnailPath);
        }
    }

}
