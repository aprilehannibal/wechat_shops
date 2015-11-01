<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/19
 * Time: 22:51
 */

namespace Shop;

use Shop\Foundation\Base;
use Shop\Foundation\Shelf as ShelfInterface;
use Shop\Data\Shelf as ShelfData;
use Shop\Foundation\ShopsException;

/**
 * 货架系统
 *
 * Class Shelf
 * @package Shop
 */
class Shelf extends Base implements ShelfInterface
{
    const API_ADD = 'https://api.weixin.qq.com/merchant/shelf/add';
    const API_DELETE = 'https://api.weixin.qq.com/merchant/shelf/del';
    const API_UPDATE = 'https://api.weixin.qq.com/merchant/shelf/mod';
    const API_LISTS = 'https://api.weixin.qq.com/merchant/shelf/getall';
    const API_GET_BY_ID = 'https://api.weixin.qq.com/merchant/shelf/getbyid';

    /**
     * 添加货架
     *
     * @param $shelfData
     * @param $shelfBanner
     * @param $shelfName
     * @return int
     * @throws ShopsException
     */
    public function add($shelfData,$shelfBanner,$shelfName)
    {

        if (is_callable($shelfData)) {
            $shelf = call_user_func($shelfData, new ShelfData());
            if (!($shelf instanceof ShelfData)) throw new ShopsException('必须返回 Shop\Data\Shelf class');
            $shelfData = $shelf->getData();
        }

        if (!is_array($shelfData)) throw new ShopsException('$shelfData　必须是数组');

        $this->response = $this->http->jsonPost(self::API_ADD,array(
            'shelf_data' => $shelfData,
            'shelf_banner'=>$shelfBanner,
            'shelf_name'=>$shelfName
        ));


        return $this->getResponse();

    }

    /**
     * 删除货架
     *
     * @param int $shelfId
     * @return bool
     * @throws ShopsException
     */
    public function delete($shelfId)
    {
        $this->response = $this->http->jsonPost(self::API_DELETE,array('shelf_id' => $shelfId));

        return $this->getResponse();
    }

    /**
     * 修改货架
     *
     * @param array $shelfData
     * @param $shelfId
     * @param $shelfBanner
     * @param $shelfName
     * @return bool
     * @throws ShopsException
     */
    public function update($shelfData,$shelfId,$shelfBanner,$shelfName)
    {
        if (is_callable($shelfData)) {
            $shelf = call_user_func($shelfData, new ShelfData());
            if (!($shelf instanceof ShelfData)) throw new ShopsException('必须返回 Shop\Data\Shelf class');
            $shelfData = $shelf->getData();
        }

        if (!is_array($shelfData)) throw new ShopsException('$shelfData　必须是数组');

        $this->response = $this->http->jsonPost(self::API_UPDATE,array(
            'shelf_id' => $shelfId,
            'shelf_data' => $shelfData,
            'shelf_banner'=>$shelfBanner,
            'shelf_name'=>$shelfName
        ));

        return $this->getResponse();
    }

    /**
     * 获取所有货架
     *
     * @return array
     * @throws ShopsException
     */
    public function lists()
    {
        $this->response = $this->http->get(self::API_LISTS);

        return $this->getResponse();
    }

    /**
     * 根据货架ID获取货架信息
     *
     * @param $shelfId
     * @return array
     * @throws ShopsException
     */
    public function getById($shelfId)
    {
        $this->response = $this->http->jsonPost(self::API_GET_BY_ID,array('shelf_id' => $shelfId));

        return $this->getResponse();
    }
}