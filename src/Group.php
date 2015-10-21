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
    const API_UPDATE_ATTRIBUTE = 'https://api.weixin.qq.com/merchant/group/propertymod';
    const API_UPDATE_PRODUCT = 'https://api.weixin.qq.com/merchant/group/productmod';
    const API_LISTS = 'https://api.weixin.qq.com/merchant/group/getall';
    const API_GET_BY_ID = 'https://api.weixin.qq.com/merchant/group/getbyid';

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
            'group_id' => $groupId
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
     * @throws Exception
     */
    public function updateAttribute($groupId, $groupName)
    {
        $response = $this->http->jsonPost(self::API_UPDATE_ATTRIBUTE,array(
            'group_id' => $groupId,
            'group_name' => $groupName
        ));

        if ($response['errcode'] == 0 && $response['errmsg'] == 'success') {
            return true;
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 修改分组商品
     *
     * @param $groupId
     * @param array $product
     * @return bool
     * @throws Exception
     */
    public function updateProduct($groupId, array $product)
    {
        foreach ($product as $v) {

            $keys = array_keys($v);

            if (count($keys) == 2) {
                if (!( $keys[0] == 'product_id' && $keys[1] == 'mod_action' )) {
                    $data[] = array('product_id' =>$v[$keys[0]], 'mod_action' => $v[$keys[1]]);
                }

            }

        }

        $response = $this->http->jsonPost(self::API_UPDATE_PRODUCT,array(
            'group_id' => $groupId,
            'product' => isset($data) && is_array($data) ? $data : $product
        ));

        if ($response['errcode'] == 0 && $response['errmsg'] == 'success') {
            return true;
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }

    }

    /**
     * 获得全部商品
     *
     * @return array
     * @throws Exception
     */
    public function lists()
    {
        $response = $this->http->get(self::API_LISTS);

        if ($response['errcode'] == 0 && $response['errmsg'] == 'success') {
            return $response['groups_detail'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 根据分组ID获取分组信息
     *
     * @param $groupId
     * @return array
     * @throws Exception
     */
    public function getById($groupId)
    {
        $response = $this->http->jsonPost(self::API_GET_BY_ID,array(
            'group_id' => $groupId
        ));

        if ($response['errcode'] == 0 && $response['errmsg'] == 'success') {
            return $response['group_detail'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

}