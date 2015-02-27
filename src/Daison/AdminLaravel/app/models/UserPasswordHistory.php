<?php namespace Daison\AdminLaravel\App\Models;

class UserPasswordHistory extends \Eloquent
{
  const PREVIOUS_PASSWORD_TO_PREVENT_COUNT = 5;
  protected $table = 'user_password_history';
  protected $fillable = [
    'user_id',
    'password_hash',
  ];


  public static function hashPassword($password)
  {
    return sha1($password . Config::get('app.key'));
  }

  public function checkIfPasswordInHistory(User $user, $password)
  {
    $history = $user
      ->passwordHistory()
      ->orderBy('created_at', 'DESC') # get the latest
      ->limit(self::PREVIOUS_PASSWORD_TO_PREVENT_COUNT) # limit to 5
      ->get();

    foreach ($history as $rec) {
      if (static::hashPassword($password) == $rec['password_hash']) {
        return true;
      }
    }

    return false;
  }

}