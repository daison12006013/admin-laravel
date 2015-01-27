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
    'Illuminate\Workbench\WorkbenchServiceProvider',
    <b>'Daison\Admin\AdminServiceProvider',</b>
```
<br>
Go to your command line
```
    php artisan config:publish daison/admin
```
<br>
Check your database configuration, you should have already setup your database and run this migration
```
    php artisan migrate --package="daison/admin"
```

# Pre-Testing
Go to your browser <b>localhost:8080/admin</b>
  You can now access the admin login page
  
  Go to your command line, and let us test this admin panel
  ```
    php artisan tinker
    > $user = new User;
    > $user->email = "email@gmail.com";
    > $user->password = Hash::make('abcd');
    > $user->save();
  ```

  Go back to the page, and login using your recently created account.
  
  Tadda! Now you can see the navigation bar, the site name, and even the logout button, let's move to configuration.

# Configuring
Remember whe used this command <b>php artisan config:publish daison/admin</b>
Go to /app/config/packages/daison/admin/ folder
you can see this files
  <ul>
    <li>general.php</li>
    <li>navs.php</li>
    <li>routes.php</li>
  </ul>
####General
    site_name - Your Application Name
    homepage_url - The url of your homepage, by default /admin/dashboard
    homepage_controller - The controller with function to be used
    user_not_found_message - If users fail to login, then show this message.
    
    
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
After creating this router with [items], refresh your page, and you can see the sample links from the nav bar.
  

####Routes
Based from our navigation links, we need to create a route to assign the controller to work with. You can also use the original routes file from /app/config/routes.php, but I suggest to use this approach to separate your original routes from admin routes.
  ```
  'admin_sample_1' => [
    'process' => 'get',
    'url'     => '/admin/sample/1',
    'uses'    => 'AdminController@sampleOne',
  ],
  'admin_sample_2' => [
    'process' => 'get',
    'url'     => '/admin/sample/2',
    'uses'    => 'AdminController@sampleTwp',
  ],
  ```
  Now create your AdminController and it's up to you to handle the responses.





------------------------------------------------------------------------------------------
I am still updating this README.
