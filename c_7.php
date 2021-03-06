<?php
/**
 * User: Andy
 * Date: 2018/9/29
 * Time: 15:14
 *
 *  第7章  错误处理  Error Handing
 *
 *
 *  或许你可以通过良好的编程经验减少应用中错误的次数
 *
 *  但是，许多造成的错误的因素是在我们的脚本控制之外的
 *
 *  网络超时，硬盘空间满，硬件错误，PHP其他组件的Bug 或者应用交互的程序 都有可能产生错误
 *
 *  而且这些错误跟php的代码无关
 *
 *  如果你没有处理这样的错误，PHP默认的处理是吧错误信息显示给用户
 *
 *  同时给出一个指向描述运行失败的函数的手册链接和产生错误的文件名和代码行数
 *
 *  对于大多数错误，PHP的显示错误后继续运行
 */

/**
 * you will learn those
 *
 * 1. 你的用户可能会遇到的不同错误类型
 * 2. 作为开发者，你可以使用PHP中的哪些选项处理他们
 * 3. 如何编写你自己的错误处理器
 * 4. 不同错误和报告机制之间的转化
 */

/** 错误类型
 *
 *  1. 编程错误
 *        语法/解析错误
 *        eval() 错误
 *        include  / require
 *
 *   2. 未定义符号
 *          变量和常量
 *          函数和类
 *          逻辑错误
 *
 *   3. 通用性错误
 *          操作系统差异
 *          PHP配置差异
 *          SAPI差异
 *
 *   4。 运行错误
 *       硬盘，网络操作，数据库调用等
 *
 *   5. PHP错误
 *
 */

# 定义错误处理器，  page/205

function my_error_handler($errno, $errstr, $file, $line)
{
    if ($errno == E_NOTICE || $errno == E_USER_NOTICE) {
        error_log("$file:$line $errtype: $errmsg \n", 3,
            "/home/log/httpd/my-php-errors.log");
        return;
    }
    PEAR::raiseError($errstr);
}

