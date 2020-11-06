<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAllBooks(){
        return view('book.catalog', ['books' => Book::whereStatus('0')->paginate(15)]);
    }

    public function getSingleBook($id){
        return view('book.book', ['book' => Book::whereId($id)->whereStatus('0')->first()]);
    }
}
