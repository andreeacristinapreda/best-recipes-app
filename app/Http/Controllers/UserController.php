<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
  // register form
  public function create() {
    return view('users.register');
  }

  // add user
  public function store(Request $request) {
    $formFields = $request->validate([
        //field => ['required', Rule::unique('table-name', 'field-name')],
        'name' => ['required', 'min:5'],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' => 'required|confirmed|min:6',
    ]);

    $formFields['password'] = bcrypt($formFields['password']);

    $user = User::create($formFields);
    auth()->login($user);

    return redirect('/')->with('message', 'User created successfully! You have been logged in!');
  }

  // log out user
  public function logout(Request $request) {
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message', 'You have been logged out!');
  }

  // login form
  public function login() {
    return view('users.login');
  }

  // login form
  public function authenticate(Request $request) {

    $formFields = $request->validate([
      //field => ['required', Rule::unique('table-name', 'field-name')],
      'email' => ['required', 'email'],
      'password' => 'required',
    ]);

    if(auth()->attempt($formFields)) {
      $request->session()->regenerate();
      return redirect('/')->with('message', 'You have been logged in!');
    }

    return back()->withErrors(['email' => 'Invalid email or password!'])->onlyInput('email');
  }
}
