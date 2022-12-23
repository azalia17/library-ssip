<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        // dd($books);
        return view('books.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'publisher' => ['required', 'string', 'max:255'],
            'synopsis' => ['required', 'string', 'max:255'],
            'publish_date' => ['required'],
            'availability' => ['required'],
            'total_pages' => ['required'],
            'genre_id' => ['required'],
            'cover' => ['required'],
        ]);

        $newImageName = time() . '-' . $request->title . '.' . $request->cover->extension();
        
        $request->cover->move(public_path('images'), $newImageName);

        $book = Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'publisher' => $request->input('publisher'),
            'publish_date' => $request->input('publish_date'),
            'total_pages' => $request->input('total_pages'),
            'synopsis' => $request->input('synopsis'),
            'availability' => $request->input('availability'),
            'genre_id' => $request->input('genre_id'),
            'cover' => $newImageName,

        ]);

        return redirect('/books');
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
    public function edit($id)
    {
        $book = Book::find($id)->first();

        return view('books.edit') -> with('book', $book);
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
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'publisher' => ['required', 'string', 'max:255'],
            'synopsis' => ['required', 'string', 'max:255'],
            'publish_date' => ['required'],
            'availability' => ['required'],
            'total_pages' => ['required'],
            'genre_id' => ['required'],
            'cover' => ['required'],
        ]);

        $newImageName = time() . '-' . $request->title . '.' . $request->cover->extension();
        
        $request->cover->move(public_path('images'), $newImageName);

        $book = Book::where('id', $id)->update([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'publisher' => $request->input('publisher'),
            'publish_date' => $request->input('publish_date'),
            'total_pages' => $request->input('total_pages'),
            'synopsis' => $request->input('synopsis'),
            'availability' => $request->input('availability'),
            'genre_id' => $request->input('genre_id'),
            'cover' => $newImageName,
        ]);
        return redirect('/books');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id)->first();

        $book->delete();
        return redirect('/books');
    }
}
