<?php
/**
 * User: Andy
 * Date: 2018/12/12
 * Time: 16:52
 */

// 代理模式
//
//

interface Subject {
    public function request();
}

class RealSubject implements Subject
{
    public function request()
    {
        echo "RealSubject:;request <br>";
    }
}

class Proxy implements Subject
{
    protected $realSubject;
    function __construct()
    {
        $this->realSubject = new RealSubject();
    }

    public function beforeRequest()
    {
        echo __CLASS__."::beforeRequest <br>";
    }

    public function request()
    {
        $this->beforeRequest();
        $this->realSubject->request();
        $this->afterRequest();
    }

    public function afterRequest()
    {
        echo __CLASS__."::afterRequest <br>";
    }
}

$proxy = new Proxy();
$proxy->request();