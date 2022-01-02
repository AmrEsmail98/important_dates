<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {


        foreach ($this->getModels() as $model) {
            $this->app->bind(
                "App\Repositories\Contracts\I{$model}Repository",
                "App\Repositories\SQL\\{$model}Repository"
            );
        }
    }

    protected function getModels()
    {
        $files = File::allFiles(app_path('Models'));

        return collect($files)->map(function ($file) {
            return basename($file, '.php');
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
