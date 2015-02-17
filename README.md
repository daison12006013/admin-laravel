# What I am looking for?
<ul>
  <li>Developer - who can help me to change, refactor, and to add a feature.</li>
  <li>Translator - you can help by translating the response messages.</li>
  <li>Designer - a designer that can transform the assets into a unique design, instead of using free designs. The credit is yours.</li>
</ul>

# Laravel Admin
I'm still keep on updating this admin package, when you are using the ``dev-master`` you will see some sample routes and navigation links, those are my examples to test all the functionality of this package. Each release has a branch and you need to switch for the said branch you used for specific README file.

Anyhow, I'm using this design <a href="http://www.blacktie.co/demo/dashgumfree/">http://www.blacktie.co/demo/dashgumfree/</a> as my basis, so try to review the code, later on I'll be importing other admin templates that you can easily configure. Thumbs Up!


# Start Up
Include this to your composer, if you want the most updated branch, use ``dev-master``
```
  	"require": {
  		"daison/admin-laravel": "1.1.0"
  	}
```


<br>
Update your composer
```
    composer update
```
<br>
Go to <b>/app/config/app.php</b> and add this line
```
    'Daison\Admin\AdminServiceProvider',
```
<br>
Go to your command line and publish the config, view and assets
```
    php artisan config:publish daison/admin-laravel
    php artisan view:publish daison/admin-laravel
    php artisan asset:publish daison/admin-laravel --path="vendor/daison/admin-laravel/src/assets"
```
<br>
Setup your database and laravel configuration, and run the package migrations
```
    php artisan migrate --package="daison/admin-laravel"
```

Or if you have an existing Users table then use publish
```
    php artisan migrate:publish daison/admin-laravel
```

# Pre-Testing
Go to your browser <b>localhost:8080/admin</b>
  You can now access the admin login page
  
  Go to your command line, and lets create an account to test this admin panel
  ```
    php artisan tinker
    > $user = new User;
    > $user->email = "email@gmail.com";
    > $user->password = Hash::make('abcd');
    > $user->save();
    > $role = new Role;
    > $role->name = 'superuser';
    > $role->save();
    > $user_role = new UserHasRole;
    > $user_role->user_id = $user->id;
    > $user_role->role_id = $role->id;
    > $user_role->save();
  ```

  Go back to the page, and log your recently created account.
  
  Tadda! Now you can see the navigation bar, the site name, and even the logout button, let's move to configuration.

# Configuration
Remember we used this command <b>php artisan config:publish daison/admin-laravel</b>
Go to /app/config/packages/daison/admin-laravel/ folder
you can see these files
  <ul>
    <li>lang
      <ul>
        <li>en.php</li>
      </ul>
    </li>
    <li>general.php</li>
    <li>navigations.php</li>
    <li>routes.php</li>
  </ul>

####Navigation
Lets create our sample navigation,
```
    [name] => [
      'name' => 'Navigation Name',
      'icon' => 'fa fa-home fa-fv',
      'url'  => '/admin/sample',
      'items'=> [
          [name] => [
              'name' => 'Second Level Nav Name',
              'icon  => '',
              'url'  => '/admin/sample/1',
          ],
          [name] => [
              'name' => 'Second Level Nav Name',
              'icon  => '',
              'url'  => '/admin/sample/2',
          ],
      ],
    ],
```
After creating these links with [items], refresh your page and see changes. You can even use ``'roles' => ['superuser']`` to limit the view access.

####Routes
Based from our navigation links, we need to create a route to assign the controller to work with. You can also use the original routes file from /app/config/routes.php, but I suggest to use this approach to separate your original routes from admin routes.
  ```
  'admin_sample_get' => [
    'process' => 'get',
    'url'     => '/admin/sample/',
    'uses'    => 'SampleController@showSample',
  ],
  'admin_sample_post' => [
    'process' => 'post',
    'url'     => '/admin/sample/',
    'uses'    => 'SampleController@saveSample',
  ],
  'admin_sample_rest_get' => [
    'process' => 'get',
    'url'     => '/admin/inventory/{id}/edit',
    'uses'    => 'InventoryController@showEditItem',
  ],
  'admin_sample_rest_post' => [
    'process' => 'post',
    'url'     => '/admin/inventory/{id}/edit',
    'uses'    => 'InventoryController@updateItem',
  ],
  ```
  Now create your SampleController / InventoryController and it's up to you to handle the responses. You can even assign ``'roles' => ['superuser']`` to restrict each request, you can also provide ``'is_auth' => true`` to redirect guest to the login page.


####Still using Main Routes
  So you still want to use the main `app/routes.php`, however you want to use the roles management to your routes.
Go to your controller `__construct` and do the constructor injection.

```
  use Daison\Admin\Admin;
  
  class MyController
  {
    private $admin;
    public function __construct(Admin $admin)
    {
      $this->admin = $admin;
    }
    
    public function showProfile()
    {
      if ($this->admin->hasAnAccess(['superuser','agent']) == false) {
        // It means the Authenticated user doesn't have roles
        // Redirect the user, show the access not allowed page... and so on..
      }
    }
    
    public function saveProfile()
    {
      // same thing as the showProfile() method.
    }
  }
```


------------------------------------------------------------------------------------------
I am still updating this README.
