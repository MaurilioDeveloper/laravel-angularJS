<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /*
         * Toda vez que foi requisitado um objeto (uma instancia) de nossa interface ClientRepository,
         * crie uma instancia do ClientRepositoryEloquent, pois uma interface nunca pode ser instanciada.
         * 
         */
        $this->app->bind(\App\Repositories\ClientRepository::class, 
                         \App\Repositories\ClientRepositoryEloquent::class
        );
        
        $this->app->bind(\App\Repositories\ProjectRepository::class, 
                         \App\Repositories\ProjectRepositoryEloquent::class
        );
        
            $this->app->bind(\App\Repositories\ProjectNoteRepository::class, 
                             \App\Repositories\ProjectNoteRepositoryEloquent::class
        );
    }
}
