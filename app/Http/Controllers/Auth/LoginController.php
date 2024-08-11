<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\Contracts\AccountContract;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * LoginController constructor.
     * @param AccountContract $repository
     */

    public $repository;

    public function __construct(AccountContract $repository)
    {
        $this->repository = $repository;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('account')->attempt($credentials)) {
            return redirect()->route('members.home')
                ->with('success', 'Login successful!');
        }

        return redirect()->back()
            ->withErrors(['error' => 'Invalid email or password'])
            ->withInput();
    }
}
