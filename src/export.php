<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/6
 * Time: 17:00
 */

/** 页面导出xls
 * @param $filename
 * @param $str
 */
function exportExcel($filename, $str)
{
    header("Content-type:application/vnd.ms-excel");
    header("Content-Disposition:attachment;filename=".$filename);
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
    header('Expires:0');
    header('Pragma:public');
    die($str);
}

/** 测试导出接口
 *
 */
function testExportExcel()
{
    $data = array(
        array('n1'=>'内容1', 'n2'=>'内容2', 'n3'=>'内容3'),
        array('n1'=>'内容11', 'n2'=>'内容22', 'n3'=>'内容33'),
    );
    $str = "序号\t列1\t列2\t列3\n";
    $str = iconv('utf-8', 'gb2312', $str);
    foreach ($data as $v) {
        $data1 = iconv("UTF-8", "GB2312//IGNORE", $v['n1']);
        $data2 = iconv("UTF-8", "GB2312//IGNORE", $v['n2']);
        $data3 = iconv("UTF-8", "GB2312//IGNORE", $v['n3']);
        $str .= "{$data1}\t{$data2}\t{$data3}\n";
    }
    $filename = '导出文件.xls';
    exportExcel($filename, $str);
}