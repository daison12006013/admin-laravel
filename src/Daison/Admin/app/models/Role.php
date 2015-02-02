<?php namespace Daison\Admin\App\Models;

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
    return $this->belongsToMany('Daison\Admin\App\Models\User', 'user_has_role');
  }
}
