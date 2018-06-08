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
    protected $app;

    /**
     * MiniProgrmLogin constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param $info
     * @return \Illuminate\Support\Collection
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function login($info)
    {
        $response = $this->app->auth->session($info['code']);
//        $response = json_decode(json_encode(['session_key' => 'asdfs']));
        $response = ResponseParse::parse($response);
        dd($response);
        return collect(['session_key' => encrypt($response['session_key'])]);
    }
}