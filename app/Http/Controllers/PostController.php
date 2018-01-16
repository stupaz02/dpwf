<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Calendar;
use App\Event;

class PostController extends Controller
{
    
    public function index()
    {
        $announcements = Post::where('category_id', 3)->latestFirst()->take(4)->get();
        $advisories = Post::where('category_id', 4)->latestFirst()->take(4)->get();
        $memoranda = Post::whereIn('category_id', [1,2])->latestFirst()->take(4)->get();
        $features = Post::where('category_id', 5)->latestFirst()->take(4)->get();

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
  
       
        return view('front.index', compact('announcements','advisories','memoranda','features','calendar'));
    }
}
