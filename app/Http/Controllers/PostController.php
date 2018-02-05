<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Calendar;
use App\Event;
use App\Slide;
use Carbon\Carbon;

class PostController extends Controller
{
    protected $limit = 2;
    
    public function index()
    {
        $photos = Slide::all();
        $announcements = Post::where('category_id', 3)->published()->latestFirst()->take(4)->get();
        $advisories = Post::where('category_id', 4)->published()->latestFirst()->take(4)->get();
        $memoranda = Post::whereIn('category_id', [1,2])->published()->latestFirst()->take(4)->get();
        $features = Post::where('category_id', 7)->published()->latestFirst()->take(4)->get();

        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#f1c633',
	                    // 'url' => 'pass here url and any route',
	                ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
  
       
        return view('front.index', compact('announcements','advisories','memoranda','features','calendar','photos'));
    }

    public function show (Post $pid)
    {
        // $post = Post::published()->findOrFail($id);

        return view("front.show", compact('pid'));
    }


    public function search ()
    {
        $posts = Post::published()->latestFirst()->filter(request('term'))->paginate(5);

        return view("front.search", compact('posts'));
        // if ($term = request('term') )
        // {
        //     $posts->where('title', 'LIKE', "%{$term}%");
        // }

        //$posts = $posts->take(5)->get();
    }

    public function showDownload()
    {
        $accounting = Post::where('category_id',8)->published()->get();
        $admin      = Post::where('category_id',9)->published()->get();
        $cashier    = Post::where('category_id',10)->published()->get();
        $cid        = Post::where('category_id',11)->published()->get();
        $legal      = Post::where('category_id',12)->published()->get();
        $lrms       = Post::where('category_id',16)->published()->get();
        $medical    = Post::where('category_id',13)->published()->get();
        $records    = Post::where('category_id',15)->published()->get();
        $sgod       = Post::where('category_id',14)->published()->get();
        $supply     = Post::where('category_id',17)->published()->get();
        
        return view('front.download', compact("accounting","admin","cashier","cid","legal","lrms","medical","records","sgod","supply"));
    }

    public function issuances()
    {
        return view('front.issuances', compact("issuances"));
    }
}
