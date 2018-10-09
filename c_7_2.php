<?php
/**
 * User: Andy
 * Date: 2018/9/29
 * Time: 20:21
 *
 * 7.4 异常处理
 *
 *  try{ throw new Exception("..."); }catch(Exception $e){ $e->getMessage(); }
 */


// 最后的机会 set_exception_handler()

function my_exception_handler(Exception $e)
{
    print "Uncaught exception of type " . get_class($e) . PHP_EOL;
    exit();
}

set_exception_handler("my_exception_handler");

throw new Exception();

