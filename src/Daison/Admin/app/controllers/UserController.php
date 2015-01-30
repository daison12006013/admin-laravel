<?php namespace Daison\Admin\App\Controllers;

use Daison\Admin\App\Models\PasswordRules as Rules;
use Daison\Admin\App\Models\User;

class UserController extends BaseController
{
  public function showChangePassword()
  {
    return \View::make('admin::admin.settings.change_password');
  }

  public function savePassword()
  {
    $old_password = \Input::get('old_password');
    $new_password = \Input::get('new_password');

    $rules = new Rules($new_password);

    $min = \Config::get('admin::general.password_settings.min');
    $has_number = \Config::get('admin::general.password_settings.has_number');
    $has_special_char = \Config::get('admin::general.password_settings.has_special_char');
    $has_upper_and_lower = \Config::get('admin::general.password_settings.has_upper_and_lower');

    $min_m = \Config::get('admin::lang/lang.password_min_err');
    $has_number_m = \Config::get('admin::lang/lang.password_has_number_err');
    $has_special_char_m = \Config::get('admin::lang/lang.password_has_special_err');
    $has_upper_and_lower_m = \Config::get('admin::lang/lang.password_up_low_err');

    try {
      if ($old_password != \Input::get('re_old_password')) {
        throw new \Exception(\Config::get('admin::lang/lang.password_old_pass_and_re'));
      }

      if (! \Hash::check($old_password, \Auth::user()->password)) {
        throw new \Exception(\Config::get('admin::lang/lang.password_db_not_match'));
      }

      $result = $rules
        ->setMinimumLength($min, $min_m)
        ->setRequireAtleastOneNumber($has_number, $has_number_m)
        ->setRequireAtleastOneSpecialCharacter($has_special_char, $has_special_char_m)
        ->setRequireUpperAndLower($has_upper_and_lower, $has_upper_and_lower_m)
        ->check();

      $user = User::find(\Auth::user()->id);
      $user->password = \Hash::make($new_password);
      $user->save();
      return \Redirect
                ::to(\Config::get('admin::routes.admin_changepass.url'))
                ->withSuccess(\Config::get('admin::lang/lang.password_success'));

    } catch (\Exception $e) {
      return \Redirect::to(\Config::get('admin::routes.admin_changepass.url'))->withError($e->getMessage())->withInput();
    }

    return;
  }

  public function showLists()
  {
    $users = \User::orderBy('last_name','ASC')->paginate(15);

    return \View::make('admin::admin.users.list')->withUsers($users);
  }

  public function showEdit($x)
  {
    $user = \User::find($x);

    if (! $user) {
      throw new \Exception('User not found');
    }

    return \View::make('admin::admin.users.edit')->withUser($user);
  }
}