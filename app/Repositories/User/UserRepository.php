<?php
/**
 * 用户仓库
 * Created by PhpStorm.
 * User: Wave
 * Date: 2018/6/7
 * Time: 18:07
 */

namespace App\Repositories\User;

use App\Contracts\Repository\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * 获取用户
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function get($id)
    {
        return User::find($id);
    }

    /**
     * 新增资源
     * @param $info
     * @return mixed
     */
    public function put($info)
    {
        $user = User::create($info);
        $user->save();
    }

    /**
     * 删除资源
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return User::where('id', $id)->delete();
    }
}