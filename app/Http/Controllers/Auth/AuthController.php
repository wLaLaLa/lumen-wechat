<?php
/**
 * Created by PhpStorm.
 * User: Wave
 * Date: 2018/6/8
 * Time: 16:01
 */

namespace App\Http\Controllers\Auth;


use App\Actions\Login\LoginAction;
use App\Http\Controllers\Common\Controller;
use Dingo\Api\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request, LoginAction $action)
    {
        $collect = $action->handle($request);
        return $this->response->array($collect);
    }
}