<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view('books.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2|max:255',
            'author' => 'required|min:2|max:255',
            'isbn' => 'nullable|max:20',
            'synopsis' => 'nullable|max:5000',
            'category_id' => 'required|exists:categories,id',
        ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'synopsis' => $request->synopsis,
            'category_id' => $request->category_id,
        ]);

        return redirect('/books');
    }

    public function index()
    {
        $books = Book::with('category')->get();

        return view('books.index', [
            'books' => $books
        ]);
    }

    public function edit(Book $book)
    {
        $categories = Category::all();

        return view('books.edit', [
            'book' => $book,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|min:2|max:255',
            'author' => 'required|min:2|max:255',
            'isbn' => 'nullable|max:20',
            'synopsis' => 'nullable|max:5000',
            'category_id' => 'required|exists:categories,id',
        ]);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'synopsis' => $request->synopsis,
            'category_id' => $request->category_id,
        ]);

        return redirect('/books');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        
        return redirect('books');
    }

    public function show(Book $book)
{
    return view('books.show', [
        'book' => $book
    ]);
}
}
