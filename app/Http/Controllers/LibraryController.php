<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index() {
        $books = Book::all();
        return view('library', compact('books'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books',
            'category' => 'required'
        ]);
        
        Book::create($data);
        return back()->with('success', 'Buku berhasil ditambahkan!');
    }

    public function destroy($id) {
        Book::findOrFail($id)->delete();
        return back()->with('success', 'Buku berhasil dihapus!');
    }

    public function update(Request $request, $id)
{
    $book = Book::findOrFail($id);
    $book->update($request->all());
    return back()->with('success', 'Book updated successfully!');
}
}