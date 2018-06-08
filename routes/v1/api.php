<?php

/*
|--------------------------------------------------------------------------
| Dingo Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$api->group([
    'middleware' => 'api.throttle', // 调用频率限制的中间件
    'limit' => 600, // 允许次数
    'expires' => 1, // 分钟
], function ($api) {

    // 模拟登陆
    $api->get('mock/token', function () {
        $user = \App\Models\User::first();
        $token = \Illuminate\Support\Facades\Auth::login($user);
        return response()->json([
            'token' => $token,
            'token_type' => 'Bearer',
            'expired' => \Illuminate\Support\Facades\Auth::factory()->getTTl(),
        ]);
    });

    // 无需jwt验证的路由
    $api->get('auth', 'Auth\AuthController@login');
    $api->get('user', 'ExampleController@user');

    // 需要jwt验证的路由
    $api->group(['middleware' => 'jwt.auth'], function ($api) {
        $api->get('index', 'ExampleController@index');
    });

});

