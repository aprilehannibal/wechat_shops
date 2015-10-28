<?php
/**
 * Created by PhpStorm.
 * User: pjxh
 * Date: 15-10-27
 * Time: 下午3:07
 */

namespace Shop\Data;

use Shop\Foundation\ShopsException;

/**
 * Class Postage
 * @package Shop\Data
 * @property $custom
 * @property $normal
 * @property $topFee
 */
class Postage  extends Base
{
    /**
     * 设置TopFee
     *
     * @param string $type
     * @return $this
     * @throws ShopsException
     */
    public function setTopFee($type = \Shop\Postage::KUAI_DI)
    {

        if (empty($this->normal) && empty($this->custom)) throw new ShopsException('请正确传入参数');
        if (empty($this->normal) || empty($this->custom)) throw new ShopsException('请正确传入参数');

        $keys = array_keys($this->custom);

        foreach ($keys as $v) {
            if (!is_numeric($v)) throw new ShopsException('数据不合法');
        }

        foreach ($this->custom as $custom) {

            $this->data['topFee'][] = array(
                'Type' => $type,
                'Normal' => $this->normal,
                'Custom' => $custom
            );
        }

        return $this;
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
     * @param Regional|null $regional
     * @return $this
     * @throws ShopsException
     */
    public function setCustom(
        $startStandards, $startFees, $addStandards, $addFees,
        $destProvince, $destCity,$destCountry = '中国'
    )
    {

        if (empty($destProvince)) throw new ShopsException('$destProvince不允许为空');

//        is_array($destCity);
//        is_string($destCity);
//        $destCity instanceof Regional;


        if ($destCity instanceof Regional) {

            is_array($destProvince);
            is_string($destProvince);

            //todo  $destProvince的判断
            //todo 　加入　全国省直辖市的　简称等
            //todo　加入　某些不平等条约的存在　例如　江浙沪　，你们懂得！！

            $destProvince = is_array($destProvince) ? $destProvince : explode(',',$destProvince);

            foreach ($destProvince as $province) {


                $citys = $destCity->getCity($province);

                if (empty($citys)) throw new ShopsException('请传入合法的省份名!!!');

                foreach ($citys[0] as $city) {
                    $this->data['custom'][] = array(
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

                $this->data['custom'][] = array(
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

}