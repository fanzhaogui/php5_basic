<?php
/**
 * User: Andy
 * Date: 2018/6/4
 * Time: 10:44
 */

/**
 * PHP 语言的基础架构
 *
 *
 * PHP 如何嵌入到THML当中
 *
 * 如何编写注释
 *
 * 管理变量和基础数据类型
 *
 * 给简单的值定义常量
 *
 * 最常用的控制结构，许多控制结构在其他编程语言也使用
 *
 * 内置的或者用户定义的函数
 *
 */

## C 方式

/**
 * 这是一个C风格的注释
 * 它可以跨越多行
 * 知道关闭标记
 */

## C++方式
// 这是一个C++风格的注释，它在行的末尾结束

## Shell方式

# 这是一个Shell风格的注释，它在行的末尾结束

/**
 * 超全局变量
 *
 * $_ENV  环境变量 -- 设置PHP全局可用时，设置php.exe路径至环境变量中
 */

/**
 * isset($variable) 运算符在遇到NULL的时候，返回false，其他数据类型只要变量存在则返回true
 */
// $a= NULL;
// $res = isset($a);

// var_dump($res); // false

/**
 * 数组
 *
 * 数组的遍历
 */
/**
 * foreach($arr as $k=>[&]$v){}
 *
 * array_walk()
 */


/**
 * PHP开发者，经常会使用C风格的
 * else if
 * 符号来替代
 * elseif
 *
 */

/**
 * 循环控制
 * break;
 *
 * break expr;
 *    break可以接收一个可选的参数，表示跳出多少层，嵌套的循环： break n;
 *    break 1 和 break的效果是一样的；
 *
 * continue;
 *
 * continue expire;
 *    continue自己构成的语句停止最里面的循环执行，并且让循环直接从下一个循环开始，而
 * continue n, 可以用来停止从 最里面 的循环往外n层的循环，
 *
 */

/*$i = 0;
while ($i++ < 5) {
    echo "1<br />\n";
    while (1) {
        echo "2<br />\n";
        while (1) {
            echo "3<br />\n";
            continue 3;
        }
        echo "This never gets output.<br />\n";
    }
    echo "Neither does this.<br />\n";
}*/

/**
 * PHP并不会帮你优化，并且缓存许多类型的循环变量。
 *
 * 如下面的for循环中的count($arr)将不会被限制只运行一次
 */

for($i = 0; $i <= count($arr); $i++) {
    // todo
}

// 应该被写出
$count = count($arr);
for($i = 0; $i <= $count; $i++) {
    // todo
}


/* 第二章 完结 */

