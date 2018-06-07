<?php

namespace App\Http\Controllers;

use App\Contracts\Repository\UserRepositoryInterface;
use App\Http\Controllers\Common\Controller;

class ExampleController extends Controller
{
    /**
     * 用户仓库
     * @var UserRepositoryInterface
     */
    protected $user_repository;

    /**
     * Create a new controller instance.
     * ExampleController constructor.
     * @param UserRepositoryInterface $user_repository
     */
    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function index()
    {
        return $this->response->array(['message' => 'welcome to lumen-wechat']);
    }

    public function user()
    {
        return $this->user_repository->get(1);
    }
}
