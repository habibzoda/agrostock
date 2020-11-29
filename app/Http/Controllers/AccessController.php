<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AccessController extends Controller
{
  public function login(Request $request)
  {
    $guest = Auth::guest();
    if (!$guest) {
      return redirect()->intended();
    }
    $from = $request->get('from', '/');
    $categories = Category::all();
    $news = News::orderBy('updated_at', 'desc')->limit(3)->get();
    return view('login', [
      'title' => 'Вход | Agrostock',
      'news' => $news, 'categories' => $categories,
      'from' => $from,
      'guest' => $guest
    ]);
  }

  public function loginHandle(Request $request)
  {
    $guest = Auth::guest();

    if (!$guest) {
      return redirect()->intended();
    }
    $fields = $request->only('email', 'password');
    $to = $request->post('to');
    $remember = $request->post('remember');

    $remember = $remember === 'on' ? true : false;

    if (Auth::attempt($fields, $remember)) {
      return redirect()->intended($to);
    }
    return redirect()->intended('/login');
  }

  public function logout(Request $request)
  {
    $from = $request->get('from', '/');
    $guest = Auth::guest();
    if ($guest) {
      return redirect()->intended();
    }
    Auth::logout();
    return redirect()->intended($from);
  }

  public function register(Request $request)
  {
    $guest = Auth::guest();
    if (!$guest) {
      return redirect()->intended();
    }

    $from = $request->get('from', '/');
    $categories = Category::all();
    $news = News::orderBy('updated_at', 'desc')->limit(3)->get();
    return view('register', [
      'title' => 'Регистрация | Agrostock',
      'news' => $news, 'categories' => $categories,
      'from' => $from,
      'guest' => $guest
    ]);
  }

  public function registerHandle(Request $request)
  {
    $guest = Auth::guest();
    if (!$guest) {
      return redirect()->intended();
    }
    $user = new User();
    $fields = $request->only('email', 'password', 'name', 'phone');
    $to = $request->post('to');
    $remember = $request->post('remember');

    $remember = $remember === 'on' ? true : false;

    foreach ($fields as $key => $value) {
      if ($key === 'password') {
        $user->{$key} = Hash::make($key);
      } else {
        $user->{$key} = $value;
      }
    }

    if (!$user->save()) {
      return redirect()->intended('/register');
    }
    Auth::login($user, $remember);
    return redirect()->intended($to);
  }

}
