<?php namespace Daison\AdminLaravel\App\Models;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface {

  use UserTrait, RemindableTrait;

  protected $fillable = [
  'email',
  'first_name',
  'middle_name',
  'last_name',
  'employee_code',
  ];

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'users';

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = array('password', 'remember_token');


  /**
   *
   *
   * @return unknown
   */
  public function roles()
  {
    return $this->belongsToMany('Daison\AdminLaravel\App\Models\Role', 'user_has_role')->orderBy('name', 'ASC');
  }

  /**
   *
   *
   * @param unknown $post
   * @return unknown
   */
  public function updateInformation($post)
  {
    $this->first_name = $post['first_name'];
    $this->middle_name = $post['middle_name'];
    $this->last_name = $post['last_name'];
    $this->employee_code = $post['employee_code'];
    $this->email = $post['email'];

    return $this;
  }
  
  public function triggerLoginAttempt()
  {
    $this->login_attempts = $this->login_attempts + 1;

    return $this;
  }

  public function triggerNextPossibleAttempt()
  {
    $sec = $this->login_attempts * $this->login_attempts;
    if ($this->login_attempts <= 1 || $this->login_attempts == null) {
      $sec = 2;
    }

    $this->next_possible_attempt = Carbon::now()->addSeconds($sec);

    return $this;
  }

  public function refreshLoginAttempts()
  {
    $this->login_attempts = null;

    return $this;
  }

  public function isForgotTokenExpired()
  {
    $forgot_token_expiration = Carbon::parse($this->forgot_token_expiration);

    $sec = Carbon::now()->diffInSeconds($forgot_token_expiration, false);
    if ($sec <= 0) {
      return true;
    }

    return false;
  }
}
