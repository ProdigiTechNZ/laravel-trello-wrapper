<?php

namespace LaravelTrello;

use Illuminate\Support\ServiceProvider;

final class TrelloServiceProvider extends ServiceProvider {

    public function boot(): void {

        $this->publishes([
            __DIR__.'/../config/trello.php' => config_path('trello.php'),
        ]);

    } //end boot()

    public function register(): void {

        $this->mergeConfigFrom(__DIR__.'/../config/trello.php', 'trello');

        $this->app->singleton('trello', function ($app) {
            return new Wrapper($app['config']);
        });

    } //end register()

} //end class
