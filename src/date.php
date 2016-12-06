<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/6
 * Time: 17:11
 */

/** 获取某一月的最后一天的日期
 * @param $date date方法生成的日期
 * @return false|string
 */
function getMonthLastDay($date)
{
    $lastDay = date('Y-m-t', strtotime($date));
    return $lastDay;
}

/**
 * @param $date
 * @return false|int
 */
function dateToTime($date)
{
    $time = strtotime($date);
    return $time;
}

/**
 * @param $time
 * @return false|string
 */
function timeToDate($time)
{
    $date = date('Y-m-d H:i:s', $time);
    return $date;
}