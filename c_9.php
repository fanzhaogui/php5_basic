<?php
/**
 * User: Andy
 * Date: 2018/9/29
 * Time: 20:37
 *
 *  第9章 主流扩展
 *
 *  重要的事情是不停止质疑！
 */

/**
 * 文件和流
 *
 *  Files and Streams
 *
 * 文件访问 File Access  -- page/262
 *
 * 程序输入/输出  Program Input/Output
 */

$fp = fopen('data.txt', 'r');

if(!$fp) {
    die("This file could not be opend.");
}

//
$line = fgets($fp);

fclose($fp);




