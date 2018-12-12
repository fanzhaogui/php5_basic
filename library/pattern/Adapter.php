<?php
/**
 * User: Andy
 * Date: 2018/12/12
 * Time: 10:41
 */

// 适配器模式
interface Target {
    public function request();
}

class Adaptee
{
    public function realRequest()
    {
        echo "这里被适配者真正的调用方法！";
    }
}

class Adapter implements Target
{
    protected $adaptee;

    function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function request()
    {
        echo "适配器转换：";
        $this->adaptee->realRequest();
    }
}


$adaptee = new Adaptee();
$target = new Adapter($adaptee);
$target->request();