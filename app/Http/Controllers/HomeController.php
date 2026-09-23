<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::with('category')
            ->with([
                'loans' => function ($query) {
                    $query->whereNull('return_at');
                }
            ])
            ->get();

        return view('home', compact('books'));
    }
}