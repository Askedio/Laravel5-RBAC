# Laravel5-RBAC
User Roles &amp; Permissions for Laravel 5.2


# Overview
This Package glues together laravel-permission and laravel-authorize to be one package giving you all the features and a simple install command to easily get started.

More details here:
* https://github.com/spatie/laravel-permission
* https://github.com/spatie/laravel-authorize


# Installation
## Install with composer
~~~
composer require askedio/laravel5-rbac:dev-master
~~~

## Add to Providers array in config/app.php
~~~
'providers' => [
   Askedio\Laravel5RBAC\Providers\GenericServiceProvider::class,
   ...
~~~

## Set up auth views and migrations
~~~
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
php artisan make:auth
php artisan migrate 
~~~


## Serv
~~~ 
php artisan serv
~~~


## Install the role and user
~~~
php artisan user:create
~~~

## Use in routes
~~~
Route::get('dashboard', [
   'middleware'=> ['web','can:admin'],
   'uses' => 'HomeController@index',
]);
~~~



