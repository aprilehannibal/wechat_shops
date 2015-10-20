<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/20
 * Time: 21:30
 */

namespace Shop;


use Overtrue\Wechat\AccessToken;
use Overtrue\Wechat\Http;
use Overtrue\Wechat\Exception;
use Shop\Foundation\Group as GroupInterface;

/**
 * 分组管理
 *
 * Class Group
 * @package Shop
 */
class Group implements GroupInterface
{
    private $http;

    const API_ADD = 'https://api.weixin.qq.com/merchant/group/add';
    const API_DELETE = 'https://api.weixin.qq.com/merchant/group/del';

    public function __construct(AccessToken $accessToken)
    {
        $this->http = new Http($accessToken);
        $this->regional = new Regional();
    }

    /**
     * 添加分组
     *
     * @param $groupName
     * @param $productList
     * @return mixed
     * @throws Exception
     */
    public function add($groupName, array $productList)
    {
        foreach (array_keys($productList) as $v) {
            if (!is_numeric($v)) {
                throw new Exception('请插入索引数组');
            }
        }

        $response = $this->http->jsonPost(self::API_ADD,array(
            'group_detail' => array(
                'group_name' => $groupName,
                'product_list' =>$productList
            )
        ));

        if ($response['errcode'] == 0 && $response['errmsg'] == 'success') {
            return $response['group_id'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 删除分组
     *
     * @param $groupId
     * @return bool
     * @throws Exception
     */
    public function delete($groupId)
    {
        $response = $this->http->jsonPost(self::API_DELETE,array(
            'group_id'=>$groupId
        ));

        if ($response['errcode'] == 0 && $response['errmsg'] == 'success') {
            return true;
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 修改分组属性
     *
     * @param $groupId
     * @param $groupName
     * @return bool
     */
    public function updateAttribute($groupId, $groupName)
    {
        // TODO: Implement updateAttribute() method.
    }

    /**
     * 修改分组商品
     *
     * @param $groupId
     * @param $product
     * @return bool
     */
    public function updateProduct($groupId, $product)
    {
        // TODO: Implement updateProduct() method.
    }

    /**
     * 获得全部商品
     *
     * @return array
     */
    public function lists()
    {
        // TODO: Implement lists() method.
    }

    /**
     * 根据分组ID获取分组信息
     *
     * @param $groupId
     * @return array
     */
    public function getById($groupId)
    {
        // TODO: Implement getById() method.
    }

}