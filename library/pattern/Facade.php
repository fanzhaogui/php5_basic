<?php
/**
 * User: Andy
 * Date: 2018/12/12
 * Time: 16:16
 */

// 外观模式
//
// Facade 外观角色，提供高级接口
// SubSystem 子系统角色，复制各自的功能实现

// 最大的优点：子系统与客服端之间是松耦合的关系，客服端不必知道具体有哪些子系统，也无需知道他们是如何工作的
//    通过引入一个外观类，提供一个客户端间接访问子系统的高级接口



class SystemA
{
    public function operationA()
    {
        echo __FUNCTION__."<br>";
    }
}

class SystemB
{
    public function operationB()
    {
        echo __FUNCTION__."<br>";
    }
}

class SystemC
{
    public function operationC()
    {
        echo __FUNCTION__."<br>";
    }
}

class Facade
{
    protected $systemA;
    protected $systemB;
    protected $systemC;

    function __construct()
    {
        $this->systemA = new SystemA();
        $this->systemB = new SystemB();
        $this->systemC = new SystemC();
    }

    public function myOperation()
    {
        $this->systemA->operationA();
        $this->systemB->operationB();
        $this->systemC->operationC();
    }
}


$facade = new Facade();
$facade->myOperation();