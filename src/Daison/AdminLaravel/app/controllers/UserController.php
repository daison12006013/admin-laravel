<?php namespace Daison\AdminLaravel\App\Controllers;

use Daison\AdminLaravel\App\Models\PasswordRules as Rules;
use Daison\AdminLaravel\App\Models\User;
use Daison\AdminLaravel\App\Models\Role;
use Daison\AdminLaravel\App\Models\UserHasRole;
use Daison\AdminLaravel\App\Models\Searcher;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\HTML;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Carbon\Carbon;

class UserController extends BaseController
{

  public function showResetPassword($token)
  {
    $user_found = true;

    try {
      if (! Cache::has($token)) {
        $user_found = false;
        throw new \Exception('Token ' . $token . ' not found.');
      }

      try {
        $user_id = Cache::get($token);
        $user = User::findOrFail($user_id);
      } catch (ModelNotFoundException $e) {
        Log::error($e->getMessage());
      }

    } catch (\Exception $e) {
      Log::error($e->getMessage());
    }

    return View::make('admin-laravel::admin.users.reset_password')->withUserFound($user_found);
  }

  public function saveResettedPassword($token)
  {
    $new_password = Input::get('new_password');
    $confirm_new_password = Input::get('confirm_new_password');

    $user_found = true;

    try {
      if (! Cache::has($token)) {
        $user_found = false;
        throw new \Exception('Token not found.');
      }

      if ($new_password != $confirm_new_password) {
        throw new \Exception(Config::get('admin-laravel::lang/lang.password_new_pass_and_re'));
      }

      $this->_checkPasswordRules($new_password);

      $user = User::find(Cache::get($token));
      if (! $user) {
        throw new \Exception('User not found.');
      }

      $user->password = Hash::make($new_password);
      $user->save();

      Cache::forget($token);
      
      return Redirect::to(URL::to(Config::get('admin-laravel::routes.admin.url')))
        ->withSuccess(Config::get('admin-laravel::lang/lang.password_success'));
    } catch(\Exception $e) {
      return Redirect::to(URL::previous())
        ->withUserFound($user_found)
        ->withError($e->getMessage());
    }
  }

  public function requestAResetPassword()
  {
    $user_id = Input::get('id');

    $new_password = Config::get('admin-laravel::general.password_settings.reset_prefix') . str_random(30);
    $password_token = str_random(50);
    

    try {
      $user = User::findOrFail($user_id);
      $user->password = Hash::make($new_password);
      $user->save();
    } catch (ModelNotFoundException $e) {

      // In the first place, the $user_id should be correct
      // We don't need to show any message
      // Just log the error
      Log::error($e->getMessage());
      throw $e;
    }

    $expires_at = Carbon::now()->addHours(Config::get('admin-laravel::general.password_settings.reset_session_hours'));
    Cache::put($password_token, $user_id, $expires_at);

    Mail::send(
      'admin-laravel::emails.reset_password', 
      array(
        'user' => $user,
        'password_token' => $password_token,
      ),
      function($message) use ($user) {
        $message->from(Config::get('admin-laravel::general.email.from'), Config::get('admin-laravel::general.email.name'));
        $message
          ->to($user->email, $user->first_name . ' ' . $user->last_name)
          ->subject('Administrator Password Reset');
      }
    );

    return Response::JSON([
      'success' => true,
      'message' => HTML::decode(parse_text(Config::get('admin-laravel::lang/lang.password_reset_req_success'), ['password' => $new_password])),
    ]);
  }

  /**
   *
   * 
   * @return mixed
   */
  public function requestAForgotPassword()
  {
    $email = Input::get('email');

    try {
      $user = User::where('email', '=', $email)->firstOrFail();
    } catch (ModelNotFoundException $e) {
      return Response::JSON([
        'success' => false,
        'message' => HTML::decode(Config::get('admin-laravel::lang/lang.password_nouser_forgot_req')),
      ]);
    }

    $password_token = str_random(50);
    $expires_at = Carbon::now()->addHours(Config::get('admin-laravel::general.password_settings.reset_session_hours'));
    Cache::put($password_token, $user->id, $expires_at);

    Mail::send(
      'admin-laravel::emails.reset_password', 
      array(
        'user' => $user,
        'password_token' => $password_token,
      ),
      function($message) use ($user) {
        $message->from(Config::get('admin-laravel::general.email.from'), Config::get('admin-laravel::general.email.name'));
        $message
          ->to($user->email, $user->first_name . ' ' . $user->last_name)
          ->subject('Forgot Password Request');
      }
    );

    return Response::JSON([
      'success' => true,
      'message' => HTML::decode(Config::get('admin-laravel::lang/lang.password_forgot_req_success')),
    ]);
  }

  /**
   *
   *
   * @return unknown
   */
  public function showChangePassword()
  {
    return View::make('admin-laravel::admin.settings.change_password');
  }

  /**
   *
   *
   * @return unknown
   */
  public function saveChangedPassword()
  {
    $old_password = Input::get('old_password');
    $new_password = Input::get('new_password');

    try {
      if ($new_password != Input::get('confirm_new_password')) {
        throw new \Exception(Config::get('admin-laravel::lang/lang.password_new_pass_and_re'));
      }

      if (! Hash::check($old_password, Auth::user()->password)) {
        throw new \Exception(Config::get('admin-laravel::lang/lang.password_db_not_match'));
      }

      $this->_checkPasswordRules($new_password);

      $user = User::find(Auth::user()->id);
      $user->password = Hash::make($new_password);
      $user->save();

      return Redirect
        ::to(Config::get('admin-laravel::routes.admin_changepass.url'))
        ->withSuccess(Config::get('admin-laravel::lang/lang.password_success'));

    } catch (\Exception $e) {
      return Redirect::to(Config::get('admin-laravel::routes.admin_changepass.url'))->withError($e->getMessage())->withInput();
    }

    return;
  }

  /**
   * 
   *
   *
   * @return unknown
   */
  public function showLists()
  {
    $searcher = new Searcher('User');
    $searcher->rules([
      'id' => '=',
      'email' => 'like',
      'first_name' => 'like',
      'last_name' => 'like',
    ])->filter();
    $searcher->sortAndOrder(Input::all());
    $users = $searcher->getTable()->paginate(Config::get('admin-laravel::general.user_lists_count'));

    return View::make('admin-laravel::admin.users.list')
      ->withUsers($users)
      ->withSearcher($searcher)
      ->withInput(Input::all());
  }

  /**
   *
   *
   * @param unknown $id
   * @return unknown
   */
  public function showEdit($id)
  {
    $user = $this->_findUser($id);

    return View::make('admin-laravel::admin.users.edit')->withUser($user);
  }

  /**
   *
   *
   * @param unknown $id
   * @return unknown
   */
  public function saveEdit($id)
  {
    $post = Input::all();

    $user = $this->_findUser($id);

    $user->updateInformation($post);
    $user->save();

    return View::make('admin-laravel::admin.users.edit')->withUser($user)->withSuccessMessage(Config::get('admin-laravel::lang/lang.user_changed_info_msg'));
  }

  /**
   *
   *
   * @return unknown
   */
  public function showAdd()
  {
    return View::make('admin-laravel::admin.users.add');
  }

  /**
   *
   *
   * @return unknown
   */
  public function saveAdd()
  {
    $post = Input::all();

    $redirect_to = Redirect::to(Config::get('admin-laravel::routes.admin_user_add.url'));

    // Try to check the password rules
    try {
      $this->_checkPasswordRules($post['password']);
    } catch(\Exception $e)
    {
      return $redirect_to->withError($e->getMessage())->withInput();
    }


    // Now, add the user
    try {
      $user = new User;
      $user->create($post);
      $user->password = Hash::make($post['password']);
      $user->save();
    } catch(\Exception $e)
    {
      $msg = Config::get('admin-laravel::lang/lang.user_add_err_msg');
      return $redirect_to->withInput()->withError($msg);
    }


    $msg = Config::get('admin-laravel::lang/lang.user_add_info_msg');
    return $redirect_to->withSuccess($msg);
  }


  /**
   *
   *
   * @param unknown $password
   * @return unknown
   */
  private function _checkPasswordRules($password)
  {
    $rules = new Rules($password);

    $min = Config::get('admin-laravel::general.password_settings.min');
    $has_number = Config::get('admin-laravel::general.password_settings.has_number');
    $has_special_char = Config::get('admin-laravel::general.password_settings.has_special_char');
    $has_upper_and_lower = Config::get('admin-laravel::general.password_settings.has_upper_and_lower');

    $min_m = Config::get('admin-laravel::lang/lang.password_min_err');
    $has_number_m = Config::get('admin-laravel::lang/lang.password_has_number_err');
    $has_special_char_m = Config::get('admin-laravel::lang/lang.password_has_special_err');
    $has_upper_and_lower_m = Config::get('admin-laravel::lang/lang.password_up_low_err');

    try {
      $result = $rules
      ->setMinimumLength($min, $min_m)
      ->setRequireAtleastOneNumber($has_number, $has_number_m)
      ->setRequireAtleastOneSpecialCharacter($has_special_char, $has_special_char_m)
      ->setRequireUpperAndLower($has_upper_and_lower, $has_upper_and_lower_m)
      ->check();

    } catch (\Exception $e)
    {
      throw $e;
    }

    return true;
  }


  /**
   *
   *
   * @param unknown $id
   * @return unknown
   */
  public function showRoles($id)
  {
    $user = $this->_findUser($id);

    $user_roles = $user->roles;
    $available_roles = Role::orderBy('name', 'ASC')->get();

    return View::make('admin-laravel::admin.users.role')->withAvailableRoles($available_roles)->withUserRoles($user_roles);
  }

  /**
   *
   *
   * @param unknown $id
   * @return unknown
   */
  public function saveRoles($id)
  {
    $user = $this->_findUser($id);

    $role = new UserHasRole;
    $role->user_id = $id;
    $role->role_id = Input::get('role_id');
    $role->save();

    return Redirect::to(URL::previous())->withSuccess(Config::get('admin-laravel::lang/lang.role_saved'));
  }

  /**
   *
   *
   * @param unknown $user_id
   * @param unknown $role_id
   * @return unknown
   */
  public function deleteRole($user_id, $role_id)
  {
    $user_has_role = UserHasRole::where('user_id', '=', $user_id)->where('role_id', '=', $role_id);

    $user_has_role->delete();

    return Redirect::to(URL::previous())->withSuccess(Config::get('admin-laravel::lang/lang.role_deleted'));
  }

  /**
   *
   *
   * @param unknown $id
   * @return unknown
   */
  private function _findUser($id)
  {
    $user = User::find($id);
    if (! $user) {
      throw new \Exception('User not found');
    }

    return $user;
  }

}
