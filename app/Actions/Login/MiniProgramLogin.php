<?php
/**
 * Created by PhpStorm.
 * User: Wave
 * Date: 2018/6/8
 * Time: 14:25
 */

namespace App\Actions\Login;

use App\Actions\ResponseParse;
use App\Contracts\Action\LoginInterface;
use EasyWeChat\MiniProgram\Application;

/**
 * 小程序登陆
 * Class MiniProgrmLogin
 * @package App\Actions\Login
 */
class MiniProgramLogin implements LoginInterface
{
    /**
     * @var Application
     */
    protected $mini_program;

    /**
     * MiniProgrmLogin constructor.
     * @param Application $mini_program
     */
    public function __construct(Application $mini_program)
    {
        $this->mini_program = $mini_program;
    }

    /**
     * @param $request
     * @return \Illuminate\Support\Collection
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function login($request = null)
    {
        $response = $this->mini_program->auth->session($request->code);
        $response = ResponseParse::parse($response);
        return collect(['session_key' => encrypt($response['session_key'])]);
    }
}