<?php
/**
 * User: Andy
 * Date: 2018/12/12
 * Time: 16:32
 */

// 享元模式
//
//

interface FlyWeight {
    public function operation();
}

class MyFlyweight implements FlyWeight
{
    protected $intrinsicState;
    function __construct($str)
    {
        $this->intrinsicState = $str;
    }

    public function operation()
    {
        echo __CLASS__.'['.$this->intrinsicState.'] do operation. <br>';
    }
}


class FlyWeightFactoory
{
    protected static $flyweightPool;

    function __construct()
    {
        if(!isset(self::$flyweightPool)) {
            self::$flyweightPool = [];
        }
    }

    public function getFlyweight($str)
    {
        if(!array_key_exists($str, self::$flyweightPool)) {
            $fw = new MyFlyweight($str);
            self::$flyweightPool[$str] = $fw;
            return $fw;
        } else {
            echo "aready in the pool, use the exist one: <br>";
            return self::$flyweightPool[$str];
        }
    }
}


$factory = new FlyWeightFactoory();
$fw = $factory->getFlyweight("one");
$fw->operation();

$fw = $factory->getFlyweight("two");
$fw->operation();

$fw = $factory->getFlyweight("one");
$fw->operation();