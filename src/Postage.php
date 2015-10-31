<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/20
 * Time: 14:43
 */

namespace Shop;


use Shop\Foundation\Base;
use Shop\Foundation\Postage as PostageInterface;
use Shop\Foundation\ShopsException;
use Shop\Data\Postage as PostageData;

/**
 * 邮费模板
 *
 * Class Postage
 * @package Shop
 */
class Postage extends Base implements PostageInterface
{

    /**
     * @var array
     */
    private $topFee;

    /**
     * @var array
     */
    private $normal;

    /**
     * @var array
     */
    private $custom;

    const PING_YOU = '10000027';
    const KUAI_DI = '10000028';
    const EMS = '10000029';

    const API_ADD = 'https://api.weixin.qq.com/merchant/express/add';
    const API_DELETE = 'https://api.weixin.qq.com/merchant/express/del';
    const API_UPDATE = 'https://api.weixin.qq.com/merchant/express/update';
    const API_GET_BY_ID = 'https://api.weixin.qq.com/merchant/express/getbyid';
    const API_LISTS = 'https://api.weixin.qq.com/merchant/express/getall';


    /**
     * 添加邮费模板
     *
     * @param $name
     * @param null $topFee
     * @param int $assumer
     * @param int $valuation
     * @return int
     * @throws ShopsException
     */
    public function add($name, $topFee, $assumer = 0, $valuation = 0)
    {
        //todo 加入闭包的方式传入参数
        if ($topFee instanceof PostageData) $topFee = $topFee->topFee;

        $this->response = $this->http->jsonPost(self::API_ADD,array(
            'delivery_template' =>array(
                'Name' => $name,
                'Assumer' => $assumer,
                'Valuation' => $valuation,
                'TopFee' => $topFee
            )
        ));

        return $this->getResponse();
    }

    /**
     * 删除邮费模板
     *
     * @param $templateId
     * @return bool
     * @throws ShopsException
     */
    public function delete($templateId)
    {
        $this->response = $this->http->jsonPost(self::API_DELETE,array('template_id' => $templateId));

        return $this->getResponse();
    }

    /**
     * 修改邮费模板
     *
     * @param $templateId
     * @param $name
     * @param null $topFee
     * @param int $assumer
     * @param int $valuation
     * @return bool
     * @throws ShopsException
     */
    public function update($templateId, $name, $topFee, $assumer = 0, $valuation = 0)
    {
        //todo 加入闭包的方式传入参数

        $this->response = $this->http->jsonPost(self::API_UPDATE,array(
            'template_id'=>$templateId,
            'delivery_template' =>array(
                'Name' => $name,
                'Assumer' => $assumer,
                'Valuation' => $valuation,
                'TopFee' => $topFee
            )
        ));

        return $this->getResponse();
    }

    /**
     * 获取指定ID的邮费模板
     *
     * @param $templateId
     * @return array
     * @throws ShopsException
     */
    public function getById($templateId)
    {
        $this->response = $this->http->jsonPost(self::API_DELETE,array('template_id' => $templateId));

        return $this->getResponse();
    }

    /**
     * 获得全部的邮费模板
     *
     * @return array
     * @throws ShopsException
     */
    public function lists()
    {
        $this->response = $this->http->get(self::API_LISTS);

        return $this->getResponse();

    }
}