<?php
/**
 * User: Andy
 * Date: 2018/10/9
 * Time: 21:46
 *
 * 代码和注释不一致，那么两者都可能是错误的。
 */


/*

一个编写PHP扩展的介绍

   学习一个编程课题最优的方法之一就是去做一些非常简单的事情！


*/


// 设想你正在编写一个Web站点，但是你需要一个函数，后者将重复一个字符串n次，用PHP编写这个函数

function self_concat($string, $n)
{
    $result = '';

    for ($i = 0; $i < $n; $i++) {
        $result .= $string;
    }
    return $result;
}

self_concat("One", 3); // OneOneOne
self_concat("One", 1); // One

// 编译扩展的两种方法
// 1 作为可加载的模块或者DSO 动态共享对象
// 2 静态的创建到PHP中

