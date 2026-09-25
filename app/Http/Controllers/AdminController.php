<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalCategories = Category::count();
        $totalUsers = User::where('role', 'user')->count();
        $activeLoans = Loan::whereNull('return_at')->count();

        $availableBooks = Book::whereDoesntHave('loans', function ($query) {
            $query->whereNull('return_at');
        })->count();

        return view('admin.dashboard', compact(
            'totalBooks',
            'totalCategories',
            'totalUsers',
            'activeLoans',
            'availableBooks'
        ));
    }

    public function loans()
    {
        $activeLoans = Loan::with(['book', 'user'])
            ->whereNull('return_at')
            ->orderBy('due_date')
            ->get();

        $loanHistory = Loan::with(['book', 'user'])
            ->whereNotNull('return_at')
            ->latest('return_at')
            ->get();

        return view('admin.loans', compact(
            'activeLoans',
            'loanHistory'
        ));
    }
}