<?php
/**
 * Created by PhpStorm.
 * User: Wave
 * Date: 2018/6/11
 * Time: 11:12
 */

namespace App\Actions\Login;


use App\Contracts\Action\LoginInterface;
use EasyWeChat\OfficialAccount\Application;

class OfficialAccountLogin implements LoginInterface
{
    /**
     * @var Application
     */
    protected $official_account;

    /**
     * OfficialAccountLogin constructor.
     * @param Application $official_account
     */
    public function __construct(Application $official_account)
    {
        $this->official_account = $official_account;
    }

    /**
     * 登陆
     * @param $request
     * @return mixed
     */
    public function login($request = null)
    {
        if ($request->has('code')) {
            $user = $this->official_account->oauth->user();
            return $user;
        }
        return $this->official_account->oauth->scopes(['snsapi_userinfo'])->redirect($request->fullUrl());
    }
}