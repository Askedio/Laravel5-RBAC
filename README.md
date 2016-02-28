# Laravel5-RBAC
User Roles &amp; Permissions for Laravel 5.2


# Overview
This Package simple glues together laravel-ermission and laravel-authorize for in one package giving you all their features and a simple install route to easily get started.

* https://github.com/spatie/laravel-permission
* https://github.com/spatie/laravel-authorize


# Installation

~~~
composer require askedio/laravel5-rbac:dev-master
~~~

~~~
Askedio\Laravel5RBAC\Providers\GenericServiceProvider::class,
~~~

~~~ 
php artisan serv
~~~

* Browse to http://localhost:8000/install
* No users will create a new user
~~~
admin@test.com
password
~~~

Default role of admin is created and assigned. Use in web routes

~~~
Route::get('dashboard', [
   'middleware'=> ['web','can:dashboard'],
   'uses' => 'HomeController@index',
]);
~~~



