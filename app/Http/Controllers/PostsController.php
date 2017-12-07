<?php

namespace App\Http\Controllers;

use App\Discussion;
use Auth;
use Illuminate\Http\Request;
use EndaEditor;

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
        $discussions = Discussion::latest()->get();
    	return view('forum.index', [
    	    'discussions' => $discussions
        ]);
    }

    public function show(Discussion $discussion)
    {

        return view('forum.show', [
            'discussion' => $discussion,
            'markdown_html' => EndaEditor::MarkDecode($discussion->body)
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

    public function edit(Discussion $discussion)
    {
        if(Auth::id() != $discussion->user_id) return redirect('/');
        return view('forum.edit', compact('discussion'));
    }

    public function update(Request $request, Discussion $discussion)
    {
        if(Auth::id() != $discussion->user_id) return redirect('/');
        $this->validate($request, $this->getStoreRule());
        $discussion->update($request->all());
        return redirect()->route('discussions.show', ['discussion' => $discussion->id]);
    }

    public function upload()
    {
        $data = EndaEditor::uploadImgFile('upload');
        return json_encode($data);
    }

    protected function getStoreRule()
    {
        return [
            'title' => 'required|string|max:20',
            'body' => 'required',
        ];
    }
}
