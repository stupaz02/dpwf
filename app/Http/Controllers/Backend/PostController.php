<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest; 
use App\Http\Requests\AttachmentsRequest; 
use App\Post;
use App\Attachment;
use Intervention\Image\Facades\Image;
// use App\Http\Controllers\Controller;

class PostController extends BackendController
{
  
    protected $uploadPath;
    protected $fileUploadPath;


    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('cms.image.directory'));
        $this->fileUploadPath = public_path(config('cms.image.files'));
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
        elseif($status == 'own')
        {
            $posts       = $request->user()->posts()->with('category','author')->latest()->paginate($this->limit);
            $postCount   = $request->user()->posts()->count();
            
        }
        else{
            $posts       = Post::with('category','author')->latest()->paginate($this->limit);
            $postCount   = Post::count();
            
        }

        $statusList = $this->statusList($request);
       
        return view("backend.post.index", compact('posts','postCount', 'onlyTrashed', 'statusList'));
    }


    private function statusList($request)
    {
        return [
            'own' => $request->user()->posts()->count(),
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
    public function store(PostRequest $request, AttachmentsRequest $request2)
    {
       
           $data = $this->handleRequest($request);
           $input = $request->user()->posts()->create($data);

          
           if($request2->hasFile('file_name'))
           {     
                $destination = $this->fileUploadPath;
                                
                foreach ($request2->file_name as $file)
                {
                    
                    if(!empty($file))
                    {
                        $fileName = time() .$file->getClientOriginalName(); 
                        $successUploaded = $file->move($destination, $fileName);   
                        
                         Attachment::create([
                               'post_id' =>$input->id,
                               'file_name' => $fileName
                             ]);
                    }

                    // $files[] = $fileName;
                }         
            }           

           return redirect()->route('post.index')->with('message', 'Your posts was created successfully!');
           
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
        $post = Post::findOrFail($id);
        // $post = Post::findOrFail($id)->delete();
        
        if($post->attachments->count() > 0)
          {
            foreach ($post->attachments as $attachment) {
                $this->removeFile($attachment->file_name);
            }
          }

          $post->delete();
            
    

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


   
}
