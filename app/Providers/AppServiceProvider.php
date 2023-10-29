<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(UrlGenerator $url): void   //UrlGeneratorクラスをインスタンス化
    {
        if (config('APP_ENV') === 'production') {   //APP_ENVがproductionの場合
            $url->forceScheme('https'); //httpsに強制的に変更
        }
    }
}
