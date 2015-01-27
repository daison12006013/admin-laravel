<?php


foreach (\Config::get('admin::routes') as $route_name => $val) {
  switch ($val['process']) {
    case 'get':
    case 'GET':
      Route::get($val['url'], [
        'as' => $route_name,
        'uses' => $val['uses'],
      ]);
    break;

    case 'post':
    case 'POST':
      Route::post($val['url'], [
        'as' => $route_name,
        'uses' => $val['uses'],
      ]);
    break;
  }
}