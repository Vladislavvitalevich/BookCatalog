<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.book.index', ['books' => Book::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBookPost $request)
    {
        $validated = $request->validated();

        $imagePath = $request->file('image');
        $imageName = Str::random(5).'_'.$imagePath->getClientOriginalName();
        $path = $request->file('image')->storeAs('books', $imageName, 'public');

        $book = new Book();
        $book->name = $request->name;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->image = $path;
        $book->save();

        return redirect()->back()
            ->with('success', 'Книга '.$book->name.' была успешно добавленна!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return view('admin.book.show', ['book'=> Book::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin.book.edit', ['book'=> Book::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreBookPost $request, $id)
    {
        $validated = $request->validated();
        $path = Book::findOrFail($id)->image;

        if ($request->file('image')){
            $imagePath = $request->file('image');
            $imageName = Str::random(5).'_'.$imagePath->getClientOriginalName();
            $path = $request->file('image')->storeAs('books', $imageName, 'public');

            Storage::disk('public')->delete(Book::findOrFail($id)->image);
        }

        $book = Book::findOrFail($id);
        $book->name = $request->name ? $request->name : $book->name;
        $book->author = $request->author ? $request->author : $book->author;
        $book->description = $request->description ? $request->description : $book->description;
        $book->image = $path;
        $book->save();

        return redirect()->back()
            ->with('success', 'Информация о книге '.$book->name.' была успешно обновленна!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        Storage::disk('public')->delete(Book::findOrFail($id)->image);
        $book->delete();
        return redirect()->route('admin.books.index');
    }
}
