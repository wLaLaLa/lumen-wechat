<?php

namespace App\Providers;

use App\Actions\Login\MiniProgramLogin;
use EasyWeChat\Factory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Contracts\Repository\UserRepositoryInterface',
            'App\Repositories\User\UserRepository'
        );

//        $this->app->bind(MiniProgramLogin::class, function ($app) {
//            return new MiniProgramLogin(Factory::miniProgram(config('wechat.mini_program.default')));
//        });
        $this->app->bind(MiniProgramLogin::class, function ($app) {
            return new MiniProgramLogin(Factory::officialAccount(config('wechat.official_account.default')));
        });

//        $this->app->bind(
//            'App\Contracts\Action\LoginInterface',
//            'App\Actions\Login\MiniProgramLogin'
//        );
        $this->app->bind(
            'App\Contracts\Action\LoginInterface',
            'App\Actions\Login\OfficialAccountLogin'
        );
    }
}
