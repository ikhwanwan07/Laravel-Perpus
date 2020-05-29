<?php

namespace App\Http\Controllers\Frontend;

use App\Book;
use App\BorrowHistory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $book = Book::paginate(10);
        return view('frontend.book.index', compact('book'));
    }

    public function show(Book $book)
    {
        //dd($book);

        return view('frontend.book.detail', compact('book'));
    }

    public function borrow(Book $book)
    {
        $user = auth()->user();
        # code...


        if ($user->borrow()->where('books.id', $book->id)->count() > 0) {
            return redirect()->back()->with('toast', 'kamu sudah meminjam buku ini');

            # code...
        }
        // if ($user->borrow()->where('qty', 0)) {
        //     return redirect()->back()->with('toast', 'stok habis');
        // }


        $user->borrow()->attach($book);
        $book->decrement('qty');
        //return 'ok';
        return redirect()->back()->with('toast', 'berhasil meminjam buku');
    }
}
