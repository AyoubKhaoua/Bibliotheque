<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('listbooks')->with('books', $books);
    }
    public function create()
    {
        return view('formBook');
    }
    public function store(Request $req)
    {
        $requestValidate = $req->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Book::create($requestValidate);
        return redirect('/books');
    }
    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
        }
        return redirect('/books');
    }
    public function show($id)
    {
        $book = Book::find($id);
        return view('formUpdate')->with('book', $book);
    }
    public function edit(Request $req)
    {
        $id = $req->id;
        $request = $req->validate([
            'name' => 'required|max:50',
            'description' => 'required',
        ]);
        $book = Book::find($id);
        $book->update($request);
        return redirect('/books');
    }

    public function cards()
    {
        $books = Book::all();
        return view('booksCards', compact('books'));
    }
}
