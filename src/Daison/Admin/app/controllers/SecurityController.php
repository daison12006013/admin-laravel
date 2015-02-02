<?php namespace Daison\Admin\App\Controllers;

use Daison\Admin\App\Models\User;

class SecurityController extends BaseController
{

  /**
   *
   *
   * @return unknown
   */
  public function index()
  {
    return \View::make('admin::admin.layouts.login');
  }

  /**
   *
   *
   * @return unknown
   */
  public function login()
  {
    $email = \Input::get('email');
    $password = \Input::get('password');

    if (\Auth::attempt(array('email' => $email, 'password' => $password))) {
      \Session::put('roles', User::find(\Auth::user()->id)->roles);
      return \Redirect::to('/admin/dashboard');
    }

    return \Redirect::to('/admin')->withError(\Config::get('admin::lang/lang.user_not_found_message'));
  }

  /**
   *
   *
   * @return unknown
   */
  public function logout()
  {
    \Auth::logout();

    return \Redirect::to('/admin');
  }
}
