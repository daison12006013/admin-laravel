<?php namespace Daison\AdminLaravel\App\Controllers;

use Daison\AdminLaravel\App\Models\User;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

class SecurityController extends BaseController
{

  /**
   *
   *
   * @return unknown
   */
  public function index()
  {
    return View::make('admin-laravel::admin.layouts.login');
  }

  /**
   *
   *
   * @return unknown
   */
  public function login()
  {
    $email = Input::get('email');
    $password = Input::get('password');

    if (Auth::attempt(array('email' => $email, 'password' => $password))) {
      Session::put('roles', User::find(Auth::user()->id)->roles);
      return Redirect::to('/admin/dashboard');
    }

    return Redirect::to('/admin')->withError(Config::get('admin-laravel::lang/lang.user_not_found_message'));
  }

  /**
   *
   *
   * @return unknown
   */
  public function logout()
  {
    Auth::logout();

    return Redirect::to('/admin');
  }
}
