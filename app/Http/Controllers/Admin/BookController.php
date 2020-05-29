<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.book.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penulis = Author::all();
        return view('admin.book.create', compact('penulis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'author_id' => 'required',
            'description' => 'required',
            'cover' => 'required|file|image',
            'qty' => 'required|numeric'


        ]);
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('assets/covers');
        }
        Book::create([
            'author_id' => $request->author_id,
            'title' => $request->title,
            'description' => $request->description,
            'cover' => $cover,
            'qty' => $request->qty

        ]);

        // dd($request->all());
        return redirect()->route('admin.book.index')->with('success', 'data buku berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $penulis = Author::all();


        return view('admin.book.edit', compact('book', 'penulis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'author_id' => 'required',
            'description' => 'required',
            'cover' => 'required|file|image',
            'qty' => 'required|numeric'


        ]);

        $cover = $book->cover;
        if ($request->hasFile('cover')) {
            Storage::delete($book->cover);
            $cover = $request->file('cover')->store('assets/covers');
        }
        $book->update([
            'author_id' => $request->author_id,
            'title' => $request->title,
            'description' => $request->description,
            'cover' => $cover,
            'qty' => $request->qty
        ]);

        // dd($request->all());
        return redirect()->route('admin.book.index')->with('success', 'data buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.book.index')->with('delete', 'Data buku  berhasil ddihapus');
    }
}
