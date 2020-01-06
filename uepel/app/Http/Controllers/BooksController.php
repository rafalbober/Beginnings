<?php

namespace App\Http\Controllers;
use App\Books;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index() {
        $books = Books::all();
        return view('books.index')->withBooks($books);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required|size:13',
            'title' => 'required',
            'description' => 'required'

        ],
            ['isbn.size' => 'The isbn must be :size digits.']);

        $Book = new Books();
        $Book->__set('isbn', $request->input('isbn'));
        $Book->__set('title', $request->input('title'));
        $Book->__set('description', $request->input('description'));
        $Book->save();

        return redirect('books/' . $Book->__get('id'));
    }

    public function show($id)
    {
        $book = Books::where('id', $id)->first();
        return view('books.show')->withBook($book);
    }

    public function edit(Books $book)
    {
        //$which = $book->id;
        return view('books.edit')->withBook($book);
    }

    public function update(Request $request, Books $book)
    {
        $request->validate([
            'isbn' => 'required|size:13',
            'title' => 'required',
            'description' => 'required'

        ],
            ['isbn.size' => 'The isbn must be :size digits.']);

        //$book = Books::find($request->input('invisible'));
        $book->isbn = $request->input('isbn');
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->update();

        return redirect('books/' . $book->id);
    }

    public function destroy(Books $book)
    {
        $book->delete();

        return redirect('books');
    }
}
