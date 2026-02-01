<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Emprunt;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    // Store borrow
    public function store(Book $book)
    {
        Emprunt::create([
            'member_id' => Auth::id(),
            'book_id' => $book->id,
        ]);

        return redirect()->back()->with('success', 'Book borrowed successfully!');
    }

    // Show all emprunts for the member
    public function index()
    {
        $emprunts = Emprunt::with('book')->where('member_id', Auth::id())->get();
        return view('emprunts.index', compact('emprunts'));
    }
}
