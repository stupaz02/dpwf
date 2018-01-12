<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    
    public function index()
    {
        $announcements = Post::where('category_id', 3)->latestFirst()->take(4)->get();
        $advisories = Post::where('category_id', 4)->latestFirst()->take(4)->get();
        $memoranda = Post::whereIn('category_id', [1,2])->latestFirst()->take(4)->get();
        $features = Post::where('category_id', 5)->latestFirst()->take(4)->get();

        return view('front.index', compact('announcements','advisories','memoranda','features'));
    }
}
