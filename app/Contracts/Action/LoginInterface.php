<?php
/**
 * Created by PhpStorm.
 * User: Wave
 * Date: 2018/6/8
 * Time: 14:18
 */

namespace App\Contracts\Action;

/**
 * 登陆接口
 * Interface LoginInterface
 * @package App\Contracts\Action
 */
interface LoginInterface
{
    /**
     * 登陆
     * @param $request
     * @return mixed
     */
    public function login($request = null);
}