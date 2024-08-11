<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Contracts\AccountContract;
use Exception;

class RegisterController extends Controller
{
    /**
     * RegisterController constructor.
     * @param AccountContract $repository
     */

    public $repository;

    public function __construct(AccountContract $repository)
    {
        $this->repository = $repository;
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        try{
            $this->repository->create($request->validated());
            return redirect()->route('login.form')->with('success', 'Registration successful! Please log in.');
        } catch(Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Registration failed. Please try again.'])->withInput();
        }
    }
}
