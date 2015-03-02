<?php namespace Daison\AdminLaravel\App\Controllers;

use Daison\AdminLaravel\App\Models\User;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

class SecurityController extends BaseController
{
  private $user;
  private $ban_time_for_humans;

  public function __construct(User $user)
  {
    $this->user = $user;
  }


  private function _authAttempt($email, $password)
  {
    if (Auth::attempt(array('email' => $email, 'password' => $password))) {
      try {
        $this->user = User::findOrFail(Auth::user()->id);
      } catch(ModelNotFoundException $e) {
        return false;
      }

      $this->user->last_login = Carbon::now();
      $this->user->refreshLoginAttempts();
      $this->user->save();

      return true;
    }

    return false;
  }


  private function _isPreventedToLogin()
  {
    $now = Carbon::now();
    $next = new Carbon($this->user->next_possible_attempt);
    $difference = $next->diffInSeconds($now, false);

    if ($difference < 0) {
      $this->ban_time_for_humans = $now->diffForHumans($next, false);

      return true;
    }

    return false;
  }


  public function index()
  {
    return View::make('admin-laravel::admin.layouts.login');
  }


  public function login()
  {
    $email = Input::get('email');
    $password = Input::get('password');

    try {

      # check if the email exists, else throw ModelNotFoundException
      $this->user = User::whereRaw('email = ?', [$email])->firstOrFail();


      # check if the user is prevented to login
      if ($this->_isPreventedToLogin()) {
        return Redirect::to(URL::previous())
          ->withError(
              parse_text(
                Config::get('admin-laravel::lang/lang.login_throttling'), [
                  'time' => $this->ban_time_for_humans
                ]
              )
          );
      }


      # try to attempt if the email and password exists
      if ($this->_authAttempt($email, $password)) {
        Session::put('roles', $this->user->roles);

        return Redirect::to(Config::get('admin-laravel::routes.admin_home.url'));
      }


      # else, call the trigger functions
      $this->user->triggerLoginAttempt();
      $this->user->triggerNextPossibleAttempt();
      $this->user->save();

    } catch (ModelNotFoundException $e) {}

    return Redirect::to(URL::previous())
      ->withError(Config::get('admin-laravel::lang/lang.user_not_found'));
  }


  public function logout()
  {
    Auth::logout();

    return Redirect::to(Config::get('admin-laravel::routes.admin.url'));
  }
}
