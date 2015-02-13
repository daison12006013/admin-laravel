<?php

return [


  /*---------------------------------------------------------------------------------
  | Login Messages
  |----------------------------------------------------------------------------------
   */
  'user_not_found_message'    => 'Please check your email or password.',
  'login_notifier'            => 'Please login to access the page.',


  /*---------------------------------------------------------------------------------
  | Password Messages
  |----------------------------------------------------------------------------------
   */
  'password_min_err'            => 'Password must contain atleast 8 alphanumeric character.',
  'password_has_number_err'     => 'Password must have atleast one number.',
  'password_has_special_err'    => 'Password must have atleast one special character.',
  'password_up_low_err'         => 'Password must have an upper and lower character.',
  'password_db_not_match'       => 'Old password did not match our record.',
  'password_success'            => 'You have successfully changed your password.',
  'password_new_pass_and_re'    => 'New password and Confirm New Password did not match.',
  'password_reset_req_success'  => 'You have requested to reset the password, the user will get notified via email to change the password. The session to change the password will expire within ' . Config::get('admin::general.password_settings.reset_session_hours') . 'hours. <br><br>While we can provide a temporary system generated password, please check below.<br><br><p style="font-size:15px;"><b>New Password: </b> {password}</p>',
  'password_forgot_req_success' => 'You have successfully requested a password reset, an email sent. The session to change your password will expire within ' . Config::get('admin::general.password_settings.reset_session_hours') . 'hours.',
  'password_nouser_forgot_req'  => 'Email not found, please try again.',

  /*---------------------------------------------------------------------------------
  | Users
  |----------------------------------------------------------------------------------
   */
  'user_add_err_msg'          => 'Email already exists.',
  'user_add_info_msg'         => 'You have successfully added a new account',
  'user_changed_info_msg'     => 'You have successfully changed this profile.',


  /*---------------------------------------------------------------------------------
  | Roles
  |----------------------------------------------------------------------------------
   */
  'role_saved'                => 'You have successfully assigned a role',
  'role_deleted'              => 'You have successfully deleted an assigned role',
  'role_edit_info_msg'        => 'You have successfully changed role name',
  'role_add_err_msg'          => 'Please provide us a role name',
  'role_add_info_msg'         => 'You have successfully added a new role',
  'role_add_space_err_msg'    => 'A role should not contain any space',
  'role_not_found'            => 'No roles found.',
];