<?php namespace Daison\AdminLaravel\App\Models;

class Role extends \Eloquent
{

  protected $table = 'role';

  /**
   *
   *
   * @return unknown
   */
  public function users()
  {
    return $this->belongsToMany('Daison\AdminLaravel\App\Models\User', 'user_has_role');
  }
}
