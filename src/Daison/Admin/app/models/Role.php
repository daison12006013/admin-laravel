<?php

class Role extends \Eloquent
{

  protected $table = 'role';

  public function users()
  {
    return $this->belongsToMany('User', 'user_has_role');
  }
}