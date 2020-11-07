<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $booksWithComments = Book::has('comments')->paginate(15);
        return view('admin.comment.index', ['books' => $booksWithComments]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.comment.show',
            [
                'comments' => $book->comments,
                 'book' => $book
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $comment = Comment::findOrfail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Комментарий  : |'. $comment->comment .' | успешно удален из базы данных!');
    }
}
