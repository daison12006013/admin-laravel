<?php

Route::filter('admin-guest', function()
{
  if (Auth::guest())
    return Redirect::to('/admin');
});