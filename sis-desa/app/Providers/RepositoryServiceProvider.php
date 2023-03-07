<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\MasdatapegawaiRepoInterfaces;
use App\Repositories\Pegawai\MasDatapegawaiRepo;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
        MasdatapegawaiRepoInterfaces::class,
        MasDatapegawaiRepo::class);
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
