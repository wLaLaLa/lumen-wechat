<?php
/**
 * Created by PhpStorm.
 * User: Wave
 * Date: 2018/6/8
 * Time: 15:29
 */

namespace App\Actions;


use EasyWeChat\Kernel\Contracts\Arrayable;
use Psr\Http\Message\ResponseInterface;

class ResponseParse
{
    public static function parse($response) {
        switch (true) {
            case $response instanceof ResponseInterface :
                return json_decode($response->getBody(), true);
                break;
            case $response instanceof Arrayable:
                return $response->toArray();
                break;
            case is_array($response):
                return $response;
            case is_object($response):
                return json_decode(json_encode($response), true);
                break;
        }
    }
}