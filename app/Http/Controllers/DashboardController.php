<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $activeLoans = auth()->user()
            ->loans()
            ->whereNull('return_at')
            ->with('book')
            ->get();

        $loanHistory = auth()->user()
            ->loans()
            ->whereNotNull('return_at')
            ->with('book')
            ->latest('return_at')
            ->get();

        return view('dashboard', compact(
            'activeLoans',
            'loanHistory'
        ));
    }
}