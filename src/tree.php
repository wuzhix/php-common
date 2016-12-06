<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/6
 * Time: 15:38
 */

/** 生成树结构
 * @param $data array('id'=>$id,'father'=>$father,'name'=>$name)数组
 * @param int $root 根节点id
 * @return array
 */
function makeTree($data, $root = 0)
{
    $ret = array();
    foreach ($data as $k => $v) {
        if ($v['father'] == $root) {
            $tmp = $data[$k];
            unset($data[$k]);
            $tmp['children'] = $this->makeTree($data, $v['id']);
            $ret[] = $tmp;
        }
    }
    return $ret;
}

/** 获取节点的全路径名称
 * @param $tree 通过makeTree生成的树形数组
 * @param $id 节点id
 * @param string $delimiter 路径分隔符
 * @return string
 */
function getNodeFullName($tree, $id, $delimiter='/')
{
    $node = '';
    foreach ($tree as $v) {
        if ($v['id'] == $id) {
            return $v['name'];
        } else {
            if (empty($v['children'])) {
                $node = '';
                continue;
            } else {
                $node = $this->getNodeName($v['children'], $id, $delimiter);
                if (!empty($node)) {
                    return $v['name'].$delimiter.$node;
                }
            }
        }
    }
    return $node;
}