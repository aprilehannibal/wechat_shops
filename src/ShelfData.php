<?php
/**
 * Created by PhpStorm.
 * User: a9396
 * Date: 2015/10/19
 * Time: 23:12
 */

namespace Shop;


use Overtrue\Wechat\Exception;

class ShelfData
{
    /**
     * @var array 数据
     */
    private $data;

    /**
     * 控件1
     *
     * @param int $count
     * @param int $groupId
     * @param int $eid
     * @return $this
     */
    public function controlOne($count, $groupId, $eid)
    {
        $this->data[] = array(
            'group_info' => array(
                'filter' => array(
                    'count' => $count
                ),
                'group_id' => $groupId
            ),
            'eid' => $eid
        );

        return $this;
    }

    /**
     * 控件2
     *
     * @param array $groupId
     * @param int $eid
     * @return ShelfData $this
     * @throws Exception
     */
    public function controlTwo(array $groupId, $eid)
    {
        if (count($groupId) > 4) {
            throw new Exception('错误个数');
        }

        $groupsData = array();

        foreach ($groupId as $v) {
            $groupsData[] = array( 'group_id' => $v);
        }

        $this->data[] = array(
            'group_infos' => array(
                'groups' => $groupsData
            ),
            'eid' => $eid
        );

        return $this;
    }

    /**
     * 控件3
     *
     * @param int $groupId
     * @param string $img
     * @param int $eid
     * @return ShelfData $this
     */
    public function controlThree($groupId, $img, $eid)
    {
        $this->data[] = array(
            'group_info' => array(
                'group_id' => $groupId,
                'img' => $img
            ),
            'eid' => $eid
        );

        return $this;
    }

    /**
     * 控件4
     *
     * @param array $groups
     * @param int $eid
     * @return $this
     * @throws Exception
     */
    public function controlFour(array $groups,$eid)
    {
        if (count($groups) > 3) throw new Exception('个数错误');

        $groupsData = array();

        foreach ($groups as $k =>$v) {
            if (count($v) != 2) throw new Exception('个数错误');

            $keys = array_keys($v);

//            [
//                ['1','images'],
//                ['1','images'],
//                ['1','images']
//            ];

            if (is_numeric($keys[0]) && is_numeric($keys[1])) {

                $values = array_values($v);

                $groupsData[] = array(
                    'group_id' => $values[0],
                    'img' => $values[1]
                );
            }

//            [
//                [ 'group_id'=>'1','img'=>'images' ],
//                [ 'group_id'=>'1','img'=>'images' ],
//                [ 'group_id'=>'1','img'=>'images' ]
//            ];

            if ($keys[0] == 'group_id' && $keys[1] == 'img') {
                $groupsData = $groups;
            }
        }

        $this->data[] = array(
            'group_infos' => array(
                'groups'=>$groupsData
            ),
            'eid' => $eid
        );

        return $this;
    }

    /**
     * 控件5
     *
     * @param array $groups
     * @param string $imgBackground
     * @param int $eid
     * @return $this
     */
    public function controlFive(array $groups,$imgBackground,$eid)
    {

        $groupsData = array();

        foreach ($groups as $v) {
            $groupsData[] = array('group_id'=>$v);
        }

        $this->data[] = array(
            'group_infos' => array(
                'groups' => $groupsData,
                'img_background'=>$imgBackground
            ),
            'eid'=>$eid
        );

        return $this;
    }

    /**
     * 获取数据
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }


}