<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SOLICITAR EMPRÉSTIMO
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, Book $book)
    {
        /*
         * Visitante:
         * guarda o livro na sessão e manda para o login.
         */
        if (!auth()->check()) {

            session()->put('pending_loan_book_id', $book->id);

            return redirect()->route('login');
        }


        /*
         * Verifica se o livro já está emprestado.
         */
        $loanExists = Loan::where('book_id', $book->id)
            ->whereNull('return_at')
            ->exists();

        if ($loanExists) {

            return back()->withErrors([
                'loan' => 'Este livro já está emprestado.',
            ]);
        }


        /*
         * Usuário autenticado:
         * vai para a tela de confirmação.
         */
        return redirect()->route('loans.confirm', $book->id);
    }


    /*
    |--------------------------------------------------------------------------
    | TELA DE CONFIRMAÇÃO
    |--------------------------------------------------------------------------
    */

    public function confirm(Book $book)
    {
        /*
         * Verifica novamente se o livro continua disponível.
         */
        $loanExists = Loan::where('book_id', $book->id)
            ->whereNull('return_at')
            ->exists();

        if ($loanExists) {

            return redirect()
                ->route('books.show', $book->id)
                ->withErrors([
                    'loan' => 'Este livro já está emprestado.',
                ]);
        }


        return view('loans.confirm', compact('book'));
    }


    /*
    |--------------------------------------------------------------------------
    | CONFIRMAR EMPRÉSTIMO
    |--------------------------------------------------------------------------
    */

    public function confirmLoan(Request $request, Book $book)
    {
        /*
         * Verifica novamente a disponibilidade.
         *
         * Isso é importante porque o livro pode ter sido
         * emprestado entre a tela de confirmação e este momento.
         */
        $loanExists = Loan::where('book_id', $book->id)
            ->whereNull('return_at')
            ->exists();

        if ($loanExists) {

            return redirect()
                ->route('books.show', $book->id)
                ->withErrors([
                    'loan' => 'Este livro já está emprestado.',
                ]);
        }


        /*
         * Registra o empréstimo.
         */
        Loan::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'loan_date' => now()->toDateString(),
            'due_date' => now()->addDays(14)->toDateString(),
        ]);


        /*
         * Após confirmar, vai para o Dashboard.
         */
        return redirect('/dashboard');
    }


    /*
    |--------------------------------------------------------------------------
    | DEVOLVER LIVRO
    |--------------------------------------------------------------------------
    */

    public function returnBook(Request $request, Loan $loan)
    {
        /*
         * O usuário só pode devolver um empréstimo que pertence a ele.
         */
        if ($loan->user_id !== auth()->id()) {
            abort(403);
        }


        /*
         * Impede uma devolução duplicada.
         */
        if ($loan->return_at !== null) {

            return back()->withErrors([
                'loan' => 'Este livro já foi devolvido.',
            ]);
        }


        /*
         * Registra a data da devolução.
         */
        $loan->update([
            'return_at' => now()->toDateString(),
        ]);


        return redirect('/dashboard');
    }
}