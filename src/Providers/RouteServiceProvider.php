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
    public function boot(Router $router)
    {
        parent::boot($router);
        $this->loadViewsFrom(realpath(__DIR__.'/../../resources/views'), 'log-viewer');
    }
    
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
            'middleware' => ['web_nocsrf', 'auth', 'not_installed', 'backend'], ], function ($router) {
                $router->get('/', 'LogViewerController@index')->name('log-viewer');
                $router->post('{file}/empty', 'LogViewerController@empty');
                $router->get('filemanager', 'LogViewerController@filemanager');
                $router->post('filemanager', 'LogViewerController@filemanager')->name('log-viewer.filemanager');
            }
        );
    }
}
