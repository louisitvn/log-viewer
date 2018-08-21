<?php

namespace Acelle\Extra\LogViewer\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function map(Router $router)
    {
        $router->group([
            'prefix' => 'log-viewer',
            'namespace' => 'Acelle\\Extra\\LogViewer\\Http\\Controllers',
            'middleware' => ['web', 'auth', 'not_installed', 'backend'], ], function ($router) {
                $router->get('/', 'LogViewerController@index')->name('log-viewer');
                $router->post('{file}/empty', 'LogViewerController@empty');
            }
        );
    }
}
