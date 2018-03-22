<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 18/03/2018
 * Time: 9:38 PM
 */

namespace IvanCLi\AlphaVantage;


use Illuminate\Support\ServiceProvider;

class AlphaVantageServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/alpha_vantage.php' => config_path('alpha_vantage.php'),
        ]);
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton('AlphaVantage', function () {
            return new AlphaVantageService(config('alpha_vantage.api_key'));
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('AlphaVantage');
    }
}