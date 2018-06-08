<?php
/**
 * Created by PhpStorm.
 * User: Wave
 * Date: 2018/6/8
 * Time: 14:02
 */

namespace App\Contracts\Action;


interface ActionInterface
{
    /**
     * @param array $request
     * @return mixed
     */
    public function handle($request= []);
}