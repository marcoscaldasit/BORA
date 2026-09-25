<?php

namespace App\Http\Controllers;

use App\Models\Loan;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
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