<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 9/8/2018
 * Time: 9:25 AM
 */

namespace Don\NavIP\Provider;
use Don\NavIP\Engine\Manager;
use Illuminate\Support\ServiceProvider;

class NavIPServiceProvider extends  ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind("nav",function (){
           return new Manager();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__ . '/../config/Nav.php' => config_path('nav.php'),
        ]);
    }
}
