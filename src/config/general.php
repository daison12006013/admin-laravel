<?php

return [

  'language'                      => 'en',

  'site_name'                     => 'Acme',
  'version'                       => '1.0.0',

  'password_settings' => [
    'min'                         => 8,     // minimum character
    'has_number'                  => true,
    'has_special_char'            => true,
    'has_upper_and_lower'         => true,
  ],


  // Advanced Configuration, You must read the documentation @ github
  'enable_top_nav'                => false,
  'top_nav_template'              => 'admin::admin.layouts.top_nav_template',
];