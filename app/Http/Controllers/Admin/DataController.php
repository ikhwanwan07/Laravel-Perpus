<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Book;
use App\BorrowHistory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function author()
    {
        $author = Author::orderBy('name', 'ASC');
        return datatables()->of($author)
            ->addColumn('action', 'admin.author.action')
            ->addIndexColumn()
            ->toJson();
    }
    public function book()
    {
        $book = Book::orderBy('title', 'ASC')->get();
        $book->load('author');
        return datatables()->of($book)
            ->addColumn('author', function (Book $model) {
                return $model->author->name;
            })
            ->editColumn('cover', function (Book $model) {
                return '<img src="' . $model->getCover() . '" height="150px" >';
            })
            ->addColumn('action', 'admin.book.action')
            ->addIndexColumn()
            ->rawColumns(['cover', 'action'])
            ->toJson();
    }
    public function borrowed()
    {
        $borrow = BorrowHistory::with('user', 'book')->isBorrowed()->latest();
        return datatables()->of($borrow)
            ->addColumn('user', function (BorrowHistory $model) {
                return $model->user->name;
            })
            ->addColumn('book_title', function (BorrowHistory $model) {
                return $model->book->title;
            })
            ->addColumn('action', 'admin.borrowed.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
    public function borrowedHistory()
    {
        $borrow = BorrowHistory::with('user', 'book')->where('admin_id', 1)->latest();
        return datatables()->of($borrow)
            ->addColumn('user', function (BorrowHistory $model) {
                return $model->user->name;
            })
            ->addColumn('book_title', function (BorrowHistory $model) {
                return $model->book->title;
            })
            ->addColumn('returned_at', function (BorrowHistory $model) {
                return $model->returned_at;
            })
            //->addColumn('action', 'admin.borrowed.action')
            ->addIndexColumn()
            //->rawColumns(['action'])
            ->toJson();
    }
}
