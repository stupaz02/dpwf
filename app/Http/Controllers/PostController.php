<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Calendar;
use App\Event;
use App\Slide;
use Carbon\Carbon;
use App\History;

class PostController extends Controller
{
    protected $limit = 2;
    
    public function index()
    {
        $photos = Slide::all();
        $announcements = Post::where('category_id', 5)->published()->latestFirst()->take(4)->get();
        $advisories = Post::where('category_id', 4)->published()->latestFirst()->take(4)->get();
        $memoranda = Post::whereIn('category_id', [6,9])->published()->latestFirst()->take(4)->get();
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
        $accounting = Post::where('category_id',2)->published()->latestFirst()->get();
        $admin      = Post::where('category_id',3)->published()->latestFirst()->get();
        $cashier    = Post::where('category_id',10)->published()->latestFirst()->get();
        $cid        = Post::where('category_id',11)->published()->latestFirst()->get();
        $legal      = Post::where('category_id',12)->published()->latestFirst()->get();
        $lrms       = Post::where('category_id',13)->published()->latestFirst()->get();
        $medical    = Post::where('category_id',14)->published()->latestFirst()->get();
        $records    = Post::where('category_id',15)->published()->latestFirst()->get();
        $sgod       = Post::where('category_id',16)->published()->latestFirst()->get();
        $supply     = Post::where('category_id',17)->published()->latestFirst()->get();
        
        return view('front.download', compact("accounting","admin","cashier","cid","legal","lrms","medical","records","sgod","supply"));
    }


  

    public function issuances()
    {
        $advisory = Post::where('category_id',4)->published()->orderBy('title')->paginate(10);
        $numbered = Post::where('category_id',6)->published()->orderBy('title')->paginate(10);
        $unnumbered = Post::where('category_id',9)->published()->orderBy('title')->paginate(10);
        
        return view("front.issuances", compact('advisory','numbered','unnumbered'));
    }


    public function history()
    {
        $history = History::all();
        $vision  = History::where('id',2)->get();
        return view("front.pages.history", compact('history','vision'));
    }

    public function vision()
    {
        $vision  = History::where('title','Vision, Mission and Core Values')->get();
        return view("front.pages.vision-mission", compact('vision'));
    }

    public function contact()
    {
        return view("front.pages.contact");
    }
}
