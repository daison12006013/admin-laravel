<?php

return [

  'site_name'                     => 'SENS',                                     // Your system name
  'version'                       => '1.0.0',                                    // Current system version, try to hover your mouse to your system name upon logging in
  'language'                      => 'en',                                       // Language to use, check config/lang/{en}.php

  'email'                         => [
    'from'                        => \Config::get('app.email.from'),             // Email to be used e.g('noreply@domain.com')
    'name'                        => \Config::get('app.email.name'),             // Your email name e.g('Acme Email System')
  ],


  /*-------------------------------------------------------------------------
  | Advanced configuration
  | -------------------------------------------------------------------------
   */
  'enable_top_nav'                => false,                                       // To enable the top navigation
  'top_nav_template'              => 'admin-laravel::admin.layouts.top_nav_template',     // Target template
  'user_lists_count'              => 30,                                          // The count lists

  'password_settings'             => [
    'min'                         => 8,                                           // Minimum password to required
    'has_number'                  => false,                                       // Password should have atleast 1 numeric
    'has_special_char'            => false,                                       // Password should have atleast 1 special character
    'has_upper_and_lower'         => false,                                       // Password should have atleast Upper and Lower case character
    'reset_prefix'                => '!Pwd',                                      // Resetting of password, starts with, by default "!Pwd"
    'reset_session_hours'         => 24,                                          // Session to reset the password within by default 24 hours
  ],

];