<?php

namespace App\Http\Controllers;

use App\Book;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function buyBook(Request $request)
    {
        $id = $request->id;
        $book = Book::whereId($request->id)->first();
        $book->status = true;
        $book->save();

        $order = new Order();
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->name  = $request->name;
        $order->save();

        $order->books()->attach($book);

        return redirect()->route('catalog.getAllBooks')->with('success', 'Заказ оформлен! В скором времени с вами свяжуться!');
    }
}
