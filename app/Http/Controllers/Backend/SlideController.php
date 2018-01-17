<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlideStoreRequest; 
use Intervention\Image\Facades\Image;
use App\Slide;


class SlideController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $slides = Slide::orderBy('created_at','desc')->paginate($this->limit);
         $slidesCount = Slide::count();

         return view("backend.slides.index", compact('slides','slidesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slide = new Slide();

        return view("backend.slides.create", compact('slide'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideStoreRequest $request)
    {
        
        $data = $this->handleRequest($request);
        
        Slide :: create($data);

        //dd('slide store clicked');
        return redirect()->route('slides.index')->with('message', 'Slide was created successfully!');
    }


    private function handleRequest($request)
    {
        $data = $request->all();

        if($request->hasFile('image'))
        {
            $image         = $request->file('image'); 
            $fileName      = time() .$image->getClientOriginalName();
            $destination   = $this->uploadPath;

            $successUploaded = $image->move($destination, $fileName);

            if($successUploaded)
            {
                $width = config('cms.image.thumbnail.width');
                $height = config('cms.image.thumbnail.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}","_thumb.{$extension}", $fileName);

                 Image::make($destination . '/' .$fileName)
                 ->resize($width, $height)
                 ->save($destination . '/' . $thumbnail);
            }

            $data['image'] = $fileName;

        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);

        return view("backend.slides.edit", compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slide = Slide::findOrFail($id);
        $oldImage = $slide->image;
        $data    = $this->handleRequest($request);
        $slide->update($data);
        
        if($oldImage !== $slide->image)
        {
            $this->removeImage($oldImage);
        }

        return redirect()->route('slides.index')->with('message', 'Slide was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::findorFail($id);

        $slide->delete();

        $this->removeImage($slide->image);

        return redirect()->route('slides.index')->with('message','Slide was deleted successfully!');
    }
}
