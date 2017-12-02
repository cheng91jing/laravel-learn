<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        $discussions = Discussion::all();
    	return view('forum.index', [
    	    'discussions' => $discussions
        ]);
    }

    public function show(Discussion $discussion)
    {
        return view('forum.show', [
            'discussion' => $discussion
        ]);
    }
}
