<?php

namespace App\Http\Controllers;

use App\Discussion;
use Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['create', 'store', 'edit', 'update']
        ]);
    }

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

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->getStoreRule());
        $data = [
            'user_id' => Auth::user()->id,
            'last_user_id' => Auth::user()->id,
        ];
        $discussion = Discussion::create(array_merge($data, $request->all()));

        return redirect()->route('discussions.show', ['discussion' => $discussion->id]);
    }

    protected function getStoreRule()
    {
        return [
            'title' => 'required|string|max:20',
            'body' => 'required',
        ];
    }
}
