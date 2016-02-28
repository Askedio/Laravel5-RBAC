<?php

namespace Askedio\Laravel5RBAC\Providers;

use App;
use Illuminate\Support\ServiceProvider;

class GenericServiceProvider extends ServiceProvider
{
    /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
  }

  /**
   * Register routes, translations, views and publishers.
   *
   * @return void
   */
  public function boot(\Illuminate\Routing\Router $router)
  {
      App::register('\Spatie\Permission\PermissionServiceProvider');

      $router->middleware('can', \Askedio\Laravel5RBAC\Http\Middleware\Authorize::class);

      if (!$this->app->routesAreCached()) {
          require realpath(__DIR__.'/../Http/routes.php');
      }
  }
}
