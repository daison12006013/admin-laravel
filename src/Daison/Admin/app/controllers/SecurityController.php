<?php namespace Daison\Admin\App\Controllers;

class SecurityController extends BaseController
{
  public function index()
  {
    return \View::make('admin::admin.layouts.login');
  }

  public function login()
  {
    $email = \Input::get('email');
    $password = \Input::get('password');

    if (\Auth::attempt(array('email' => $email, 'password' => $password))) {
      return \Redirect::to('/admin/dashboard');
    }

    return \Redirect::to('/admin')->withError(\Config::get('admin::lang\lang.user_not_found_message'));
  }

  public function logout()
  {
    \Auth::logout();

    return \Redirect::to('/admin');
  }
}