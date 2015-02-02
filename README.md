# Start Up

Include this to your composer
```
  	"require": {
  		"daison/admin": "dev-master"
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
Go to your command line and publish the config and assets
```
    php artisan config:publish daison/admin
    php artisan asset:publish daison/admin --path="vendor/daison/admin/src/assets"
```
<br>
Setup your database and laravel config for it, and run the package migrations
```
    php artisan migrate --package="daison/admin"
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
    > $user_role->user_id = 1;
    > $user_role->role_id = 1;
    > $user_role->save();
  ```

  Go back to the page, and log your recently created account.
  
  Tadda! Now you can see the navigation bar, the site name, and even the logout button, let's move to configuration.

# Configuration
Remember we used this command <b>php artisan config:publish daison/admin</b>
Go to /app/config/packages/daison/admin/ folder
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






------------------------------------------------------------------------------------------
I am still updating this README.
