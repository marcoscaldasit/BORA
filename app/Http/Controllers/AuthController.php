<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        auth()->login($user);

        $request->session()->regenerate();

        if ($request->session()->has('pending_loan_book_id')) {

            $bookId = $request->session()->pull('pending_loan_book_id');

            return redirect()->route('loans.confirm', $bookId);
        }

        return redirect('/books');
    }


    public function showLogin()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($credentials)) {

            return back()->withErrors([
                'email' => 'E-mail ou senha inválidos.',
            ]);
        }

        $request->session()->regenerate();

        if ($request->session()->has('pending_loan_book_id')) {

            $bookId = $request->session()->pull('pending_loan_book_id');

            return redirect()->route('loans.confirm', $bookId);
        }

        return redirect('/books');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('auth.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
        ]);

        $user = auth()->user();
        $user->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('profile')
            ->with('success', 'Nome de perfil atualizado com sucesso.');
    }

    public function settings()
    {
        return view('auth.settings');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'A senha atual está incorreta.',
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('settings')
            ->with('success', 'Senha atualizada com sucesso.');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}