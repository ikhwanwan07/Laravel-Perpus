<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\BorrowHistory;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function index()

    {
        return view('admin.borrowed.index');
    }

    public function return(Book $book, BorrowHistory $borrowHistory)
    {
        $borrowHistory->update([
            'returned_at' => Carbon::now(),
            'admin_id' => Auth::user()->id
        ]);
        $borrowHistory->book()->increment('qty');

        //dd($borrowHistory);
        return redirect()->back()->with('success', 'buku dikembalikan');
    }
    public function history()
    {
        return view('admin.borrowed.history');
    }
}
