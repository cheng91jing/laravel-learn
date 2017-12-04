<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->getRequestRule());
        Comment::create(array_merge($request->all(), ['user_id' => Auth::id()]));
        return redirect()->route('discussions.show', ['discussion' => $request->get('discussion_id')]);
    }

    protected function getRequestRule()
    {
        return [
            'body' => 'required',
            'discussion_id' => 'required',
        ];
    }
}
