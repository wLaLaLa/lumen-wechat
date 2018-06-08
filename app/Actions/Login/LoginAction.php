<?php
/**
 * Created by PhpStorm.
 * User: Wave
 * Date: 2018/6/8
 * Time: 14:01
 */

namespace App\Actions\Login;


use App\Contracts\Action\ActionInterface;
use App\Contracts\Action\LoginInterface;

class LoginAction implements ActionInterface
{
    protected $login;

    public function __construct(LoginInterface $login)
    {
        $this->login = $login;
    }

    /**
     * @param array $request
     * @return mixed
     */
    public function handle($request=[])
    {
        return $this->login->login($request);
    }
}