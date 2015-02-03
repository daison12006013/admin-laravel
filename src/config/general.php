<?php

return [

  'language'                      => 'en',

  'site_name'                     => 'Acme',
  'version'                       => '1.0.0',

  'password_settings' => [
    'min'                         => 8,
    'has_number'                  => false,
    'has_special_char'            => false,
    'has_upper_and_lower'         => false,

    'autolock'                    => true,
    'autolock_attempt'            => 5,

    'reset_prefix'                => '!Pwd',
  ],


  // Advanced Configuration, You must read the documentation @ github
  'enable_top_nav'                => false,
  'top_nav_template'              => 'admin::admin.layouts.top_nav_template',


  'user_lists_count'              => 30,

];