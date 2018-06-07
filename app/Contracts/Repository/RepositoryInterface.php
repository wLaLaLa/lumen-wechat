<?php
/**
 * Created by PhpStorm.
 * User: Wave
 * Date: 2018/6/7
 * Time: 18:12
 */

namespace App\Contracts\Repository;

interface RepositoryInterface
{
    /**
     * 根据ID获取资源
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function get($id);

    /**
     * 新增资源
     * @param $info
     * @return mixed
     */
    public function put($info);

    /**
     * 删除资源
     * @param $id
     * @return mixed
     */
    public function delete($id);
}