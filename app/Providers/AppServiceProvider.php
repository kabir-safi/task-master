<?php

namespace App\Providers;

use App\Services\MerchantService;
use App\Interfaces\MerchantServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {

//        $this->app->bind('MerchantService', \App\Services\MerchantService::class);
//        App::bind('MerchantService',\App\Services\MerchantService::class);
        //
//        $this->app->bind(AppService::class, function ($app) {
//            dd('$merchantService',$app);
//            $merchantService = new MerchantService();
//            dd('$merchantService',$merchantService);
//            return new AppService($merchantService);
//            return new MerchantService($app->make(MerchantService::class));
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

}
