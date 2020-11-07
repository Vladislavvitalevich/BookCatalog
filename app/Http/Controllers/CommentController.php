<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\SaveBookComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function saveComment(SaveBookComment $request){
        $validated = $request->validated();

        $comment =  new Comment();
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->book_id = $request->bookId;
        $comment->save();

        return redirect()->back()->with('success', "Комметарий был успешно добавлен!");
    }
}
