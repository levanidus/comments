<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comment::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newComment = new Comment;
        $newComment->author = $request->comment['author'];
        $newComment->text = $request->comment['text'];
        $newComment->save();

        return $newComment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingComment = Comment::find($id);
        if ($existingComment) {
            $existingComment->text = $request->comment["text"];
            $existingComment->save(); 
            return $existingComment;
        }

        return 'Comment not found.';
    }

    public function destroy($id)
    {
        $existingComment = Comment::find($id);
        if ($existingComment) {
            $existingComment->delete(); 
            return "Comment successfully deleted.";
        }

        return 'Comment not found.';
    }


}
