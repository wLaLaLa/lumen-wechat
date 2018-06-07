<?php
/**
 * Created by PhpStorm.
 * User: Wave
 * Date: 2018/6/7
 * Time: 18:24
 */

namespace App\Providers\Repository;


use Illuminate\Support\ServiceProvider;

class UserRepositoryProvider extends ServiceProvider
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
    }
}