<?php
/**
 * Created by PhpStorm.
 * User: win7
 * Date: 2018/9/27
 *
 * 异常处理
 *
 *
 *  try throw catch
 */

class SQLException extends Exception
{
    function __construct($message = "")
    {
        parent::__construct($message);
    }
}

try{

    throw new SQLException("Could not connet to database!");
} catch (SQLException $e) {

    print "Catch an SQLException with problem with problem : ". $e->getMessage();
} catch (Exception $e) {

    print "Catch unrecognized exception : ".$e->getMessage();
}




/* 第一章 完结 */