<?php
/**
 * User: Andy
 * Date: 2018/10/9
 * Time: 22:36
 */

/*
 * CLI
 *
 * 默认参数
 *
 * -q 在输出中抑制HTTP头信息
 * -C PHP不会更改他的工作目录到主脚本的目录
 * html_errors PHP的错误信息将是普通的文本，而不是HTML
 * implicit _flush
 * register_argc_argv 注册$argv 和 $argv 全局变量，无视在php.ini中register_argc_arg的设置
 * max_execution_time PHP让脚本执行的最长的时间 用秒计算； 0表示没有限制
 *
 * 额外的选项
 *
 * -r 像PHP代码一样运行代码，不需要<?php
 * -R 把标准输入的每一行作为代码运行
 * -B 在处理 -R 或者 -F 之前运行代码
 * -E 在处理 -R 或者 -F 之后运行代码
 * -F 每次输入就执行文件
 * */

/*

$ php r 'var_dump(urlencode("@#$"));'  // 注意分号
*/

