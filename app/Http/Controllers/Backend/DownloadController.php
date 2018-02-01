<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends BackendController
{
    

    public function downloadFile($file)
    {
        
        $pathToFile = storage_path('app/public/files/' . $file);
        return response()->download($pathToFile, $file);

    }
}
