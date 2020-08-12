<?php


namespace Faed\Json;

use Illuminate\Support\ServiceProvider;
class JsonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            $this->configPath() => config_path('json-ylt.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'json-ylt');
    }



    /**
     * Set the config path
     *
     * @return string
     */
    protected function configPath()
    {
        return __DIR__ . '/config/json-ylt.php';
    }
}
