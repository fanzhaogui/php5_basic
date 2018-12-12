<?php
/**
 * User: Andy
 * Date: 2018/12/12
 * Time: 10:02
 */

// 建造者模式
//
//

abstract class Builder
{
    protected $car;
    abstract public function buildPartA();
    abstract public function buildPartB();
    abstract public function buildPartC();
    abstract public function getResult();
}

class Car
{
    protected $partA;
    protected $partB;
    protected $partC;

    public function setPartA($str)
    {
        $this->partA = $str;
    }

    public function setPartB($str)
    {
        $this->partB = $str;
    }

    public function setPartC($str)
    {
        $this->partC = $str;
    }

    public function show()
    {
        echo "这辆车由：".$this->partA.",".$this->partB.",".$this->partC."组成！";

    }
}


class CarBuilder extends Builder
{
    public function __construct()
    {
        $this->car = new Car();
    }

    public function buildPartA()
    {
        $this->car->setPartA("发动机");
    }

    public function buildPartB()
    {
        $this->car->setPartB("轮子");
    }

    public function buildPartC()
    {
        $this->set->setPartC("其他零件");
    }

    public function getResult()
    {
        return $this->car;
    }
}


class Director
{
    public $myBuilder;

    public function startBuild()
    {
        $this->myBuilder->buildPartA();
        $this->myBuilder->buildPartB();
        $this->myBuilder->buildPartC();
        return $this->myBuilder->getResult();
    }

    public function setBuilder(Builder $builder)
    {
        $this->myBuilder = $builder;
    }
}


// 要建造什么   车
// 车是什么样子的
$carBuilder = new CarBuilder();

// 搭建 造车环境
$director = new Director();
$director->setBuilder($carBuilder);

// 开始造
$newCar = $director->startBuild();

// 结果，造出来的车是什么样的
$newCar->show();