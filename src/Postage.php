<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/20
 * Time: 14:43
 */

namespace Shop;


use Shop\Foundation\Postage as PostageInterface;
use Overtrue\Wechat\AccessToken;
use Overtrue\Wechat\Http;
use Overtrue\Wechat\Exception;

class Postage implements PostageInterface
{


    /**
     * @var Http
     */
    private $http;

    /**
     * @var Regional
     */
    private $regional;

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
     * @param AccessToken $accessToken
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->http = new Http($accessToken);
        $this->regional = new Regional();
    }

    /**
     * 设置TopFee
     *
     * @param string $type
     * @throws Exception
     */
    public function setTopFee($type = self::KUAI_DI)
    {

        if (empty($this->normal) && empty($this->custom)) throw new Exception('请正确传入参数');
        if (empty($this->normal) || empty($this->custom)) throw new Exception('请正确传入参数');

        $keys = array_keys($this->custom);

        foreach ($keys as $v) {
            if (!is_numeric($v)) throw new Exception('数据不合法');
        }

        foreach ($this->custom as $custom) {

            $this->topFee[] = array(
                'Type' => $type,
                'Normal' => $this->normal,
                'Custom' => $custom
            );
        }

        dump($this);

        exit;
    }

    /**
     * 设置 Normal
     *
     * @param $startStandards
     * @param $startFees
     * @param $addStandards
     * @param $addFees
     * @return $this
     */
    public function setNormal($startStandards, $startFees, $addStandards, $addFees)
    {
        $this->normal = array(
            'StartStandards' => $startStandards,
            'StartFees' => $startFees,
            'AddStandards' => $addStandards,
            'AddFees' => $addFees
        );

        return $this;
    }

    /**
     * 设置Custom
     *
     * @param $startStandards
     * @param $startFees
     * @param $addStandards
     * @param $addFees
     * @param $destProvince
     * @param null $destCity
     * @param string $destCountry
     * @return $this
     * @throws Exception
     */
    public function setCustom($startStandards, $startFees, $addStandards, $addFees,  $destProvince, $destCity = null,$destCountry = '中国')
    {

        if (empty($destProvince)) throw new Exception('$destProvince不允许为空');

        if (empty($destCity)) {
            $destProvince = is_array($destProvince) ? $destProvince : explode(',',$destProvince);

                foreach ($destProvince as $province) {


                    $citys = $this->regional->getCity($province);

                    if (empty($citys)) throw new Exception('请传入合法的省份名!!!');

                    foreach ($citys[0] as $city) {
                        $this->custom[] = array(
                            'StartStandards' => $startStandards,
                            'StartFees' => $startFees,
                            'AddStandards' => $addStandards,
                            'AddFees' => $addFees,
                            'DestCountry' => $destCountry,
                            'DestProvince' => $province,
                            'DestCity' => $city
                        );
                    }

                }

            return $this;

        } else {

            $destCity = is_array($destCity) ? $destCity : explode(',',$destCity);

            foreach ($destCity as $city) {

                $this->custom[] = array(
                    'StartStandards' => $startStandards,
                    'StartFees' => $startFees,
                    'AddStandards' => $addStandards,
                    'AddFees' => $addFees,
                    'DestCountry' => $destCountry,
                    'DestProvince' => $destProvince,
                    'DestCity' => $city
                );

            }

            return $this;

        }
    }


    /**
     * 添加邮费模板
     *
     * @param $name
     * @param null $topFee
     * @param int $assumer
     * @param int $valuation
     * @return int
     * @throws Exception
     */
    public function add($name, $topFee = null, $assumer = 0, $valuation = 0)
    {
        if (empty($topFee) && empty($this->topFee)) {
            throw new Exception('该参数不允许为空');
        }

        $response = $this->http->jsonPost(self::API_ADD,array(
            'delivery_template' =>array(
                'Name' => $name,
                'Assumer' => $assumer,
                'Valuation' => $valuation,
                'TopFee' => empty($topFee) ? $this->topFee : $topFee
            )
        ));

        if ($response['errcode'] == 0 && $response['errmsg'] == 'success') {
            return $response['template_id'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 删除邮费模板
     *
     * @param $templateId
     * @return bool
     * @throws Exception
     */
    public function delete($templateId)
    {
        $response = $this->http->jsonPost(self::API_DELETE,array('template_id' => $templateId));

        if ($response['errcode'] == 0 && $response['errmsg'] == 'success') {
            return true;
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
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
     * @throws Exception
     */
    public function update($templateId, $name, $topFee = null, $assumer = 0, $valuation = 0)
    {
        if (empty($topFee) && empty($this->topFee)) {
            throw new Exception('该参数不允许为空');
        }

        $response = $this->http->jsonPost(self::API_UPDATE,array(
            'template_id'=>$templateId,
            'delivery_template' =>array(
                'Name' => $name,
                'Assumer' => $assumer,
                'Valuation' => $valuation,
                'TopFee' => empty($topFee) ? $this->topFee : $topFee
            )
        ));

        if ($response['errcode'] == 0 && $response['errmsg'] == 'success') {
            return true;
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 获取指定ID的邮费模板
     *
     * @param $templateId
     * @return array
     * @throws Exception
     */
    public function getById($templateId)
    {
        $response = $this->http->jsonPost(self::API_DELETE,array('template_id' => $templateId));

        if ($response['errcode'] == 0 && $response['errmsg'] == 'success') {
            return $response['template_info'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }
    }

    /**
     * 获得全部的邮费模板
     *
     * @return array
     * @throws Exception
     */
    public function lists()
    {
        $response = $this->http->get(self::API_LISTS);

        if ($response['errcode'] == 0 && $response['errmsg'] == 'success') {
            return $response['templates_info'];
        } else {
            throw new Exception($response['errmsg'],$response['errcode']);
        }

    }
}