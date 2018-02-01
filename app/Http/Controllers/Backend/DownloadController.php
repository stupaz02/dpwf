<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attachment;

class DownloadController extends BackendController
{
    

    public function downloadFile($file)
    {
        
        $pathToFile = storage_path('app/public/files/' . $file);
        return response()->download($pathToFile, $file);

    }


    public function destroyAtt($id)
    {
         
        $attachment = Attachment::findOrFail($id);

         $this->removeFile($attachment->file_name);
         
         $attachment->delete();
 
  
        return redirect()->back()->with('message','Attachment has successfully deleted');
    }
}
