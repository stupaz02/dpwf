<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest; 
use App\Post;
use Intervention\Image\Facades\Image;
// use App\Http\Controllers\Controller;

class PostController extends BackendController
{
    protected $limit = 5;
    protected $uploadPath;



    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('cms.image.directory'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $onlyTrashed = FALSE;

        if(($status = $request->get('status')) && $status == 'trash')
        {
            $posts       = Post::onlyTrashed()->with('category','author')->latest()->paginate($this->limit);
            $postCount   = Post::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        }
        elseif($status == 'published')
        {
            $posts       = Post::published()->with('category','author')->latest()->paginate($this->limit);
            $postCount   = Post::published()->count();
            
        }
        elseif($status == 'scheduled')
        {
            $posts       = Post::scheduled()->with('category','author')->latest()->paginate($this->limit);
            $postCount   = Post::scheduled()->count();
            
        }
        elseif($status == 'draft')
        {
            $posts       = Post::draft()->with('category','author')->latest()->paginate($this->limit);
            $postCount   = Post::draft()->count();
            
        }
        else{
            $posts       = Post::with('category','author')->latest()->paginate($this->limit);
            $postCount   = Post::count();
            
        }

        $statusList = $this->statusList();
       
        return view("backend.post.index", compact('posts','postCount', 'onlyTrashed', 'statusList'));
    }


    private function statusList()
    {
        return [
            'all' => Post::count(),
            'published' => Post::published()->count(),
            'scheduled' => Post::scheduled()->count(),
            'draft' => Post::draft()->count(),
            'trash' => Post::onlyTrashed()->count(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('backend.post.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
       
           $data = $this->handleRequest($request);
           $request->user()->posts()->create($data);

           return redirect()->route('post.index')->with('message', 'Your posts was created successfully!');
           
    }


    private function handleRequest($request)
    {
        $data = $request->all();

        if($request->hasFile('image'))
        {
            $image         = $request->file('image'); 
            $fileName      = $image->getClientOriginalName();
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
        $post = Post::findOrFail($id);

        return view('backend.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post          = Post::findOrFail($id);
        $oldImage      = $post->image;
        $data          = $this->handleRequest($request);
        $post->update($data);

        if($oldImage !== $post->image)
        {
            $this->removeImage($oldImage);
        }

        return redirect()->route('post.index')->with('message', 'Your post was updated successfully!');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id)->delete();
        return redirect()->route('post.index')->with('trash-message', ['Your post moved to Trash', $id]);

    }


    public function forceDestroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();

        $this->removeImage($post->image);

        return redirect('/backend/post?status=trash')->with('message', 'Your post has been deleted successfully');

    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->back()->with('message','Your post has been moved from the Trash');
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
}
