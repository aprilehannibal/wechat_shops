<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/19
 * Time: 19:43
 */

namespace Shop\Foundation;

/**
 * 邮费接口
 *
 * Interface Postage
 * @package Shop
 */
interface Postage
{
    /**
     * 添加邮费模板
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data);

    /**
     * 删除邮费模板
     *
     * @param array $data
     * @return mixed
     */
    public function delete(array $data);

    /**
     * 修改邮费模板
     *
     * @param array $data
     * @return mixed
     */
    public function update(array $data);

    /**
     * 获取指定ID的邮费模板
     *
     * @param array $data
     * @return mixed
     */
    public function getById(array $data);

    /**
     * 获得全部的邮费模板
     *
     * @return mixed
     */
    public function lists();

}