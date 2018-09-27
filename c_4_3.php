<?php
/**
 * User: Andy
 * Date: 2018/6/7
 * Time: 0:47
 */

/**
 * 观察者模式  Observer Pattern
 *
 *  观察者模式 允许对象注册到一个特定的时间和/或者数据，当这个事件发生和数据发生改变时，它会自动通报;
 * 一个对象想要“可观察”， 通常需要一个注册方法，让这个观察者对象可以注册自己。
 */

interface Observer
{
    function notify($obj);
}

// 汇率计算的例子
class ExchangeRate
{
    static private $instance = NULL;
    private $observers = array();
    private $exchange_rate;

    private function __construct()
    {

    }

    // get simple object
    static public function getInstance()
    {
        if(self::$instance == NULL) {
            self::$instance = new ExchangeRate();
        }
        return self::$instance;
    }

    // 获取
    public function getExchangeRate()
    {
        return $this->exchange_rate;
    }

    // 设置
    public function setExchangeRate($new_rate)
    {
        $this->exchange_rate = $new_rate;
        $this->notifyObservers();
    }

    // 注册
    public function registerObserver($obj)
    {
        $this->observers[] = $obj;
    }

    function notifyObservers()
    {
        foreach($this->observers as $obj) {
            $obj->notify($this);
        }
    }
}

class ProductItem implements Observer
{
    public function __construct()
    {
        ExchangeRate::getInstance()->registerObserver($this);
    }

    public function notify($obj)
    {
        if ($obj instanceof ExchangeRate) {
            // 更新交易率数据
            echo "Received Update \n";
        }
    }
}

$product1 = new ProductItem();
$product2 = new ProductItem();

ExchangeRate::getInstance()->setExchangeRate(4.5);





























