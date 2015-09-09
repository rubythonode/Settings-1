<?php

namespace Lavalite\Settings\Providers;

use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../../../resources/views', 'settings');
        $this->loadTranslationsFrom(__DIR__.'/../../../../resources/lang', 'settings');

        $this->publishResources();
        $this->publishMigrations();

        include __DIR__ . '/../Http/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('settings', function ($app) {
            return $this->app->make('Lavalite\Settings\Settings');
        });

        $this->app->bind(
            'Lavalite\\Settings\\Interfaces\\SettingRepositoryInterface',
            'Lavalite\\Settings\\Repositories\\Eloquent\\SettingRepository'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('settings');
    }

    /**
     * Publish resources.
     *
     * @return  void
     */
    private function publishResources()
    {
        $this->publishes([__DIR__.'/../../../../config/config.php' => config_path('settings.php')], 'config');

       // Merge setting module to settings package config
        $this->mergeConfigFrom(
                __DIR__.'/../../../../config/setting.php', 'settings'
        );
    }

    /**
     * Publish migration and seeds.
     *
     * @return  void
     */
    private function publishMigrations()
    {
        $this->publishes([__DIR__.'/../../../../database/migrations/' => base_path('database/migrations')], 'migrations');
        $this->publishes([__DIR__.'/../../../../database/seeds/' => base_path('database/seeds')], 'seeds');
    }


}
