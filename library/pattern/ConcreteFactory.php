<?php
/**
 * User: Andy
 * Date: 2018/12/10
 * Time: 19:21
 */

// 工厂方法模式
//
// 对应的产品有对应的 产品类
// 对象的产品有对应的  工厂类

// 抽象产品类
interface Animal {
    public function run();
    public function say();
}

// 抽象的工厂类
abstract class Factory {
    abstract static function createAnimal();
}

// 具体的产品类
class Cat implements Animal
{
    public function run()
    {
        echo "i'm runing!";
    }

    public function say()
    {
        echo "miao miao miao!";
    }
}

class Dog implements Animal
{
    public function run()
    {
        echo "i'm runing!";
    }

    public function say()
    {
        echo "wang wang wang !";
    }
}


// 具体工厂类
class CreateCatFactory extends Factory
{
    protected $animal;
    public static function createAnimal()
    {
        return new Cat();
    }
}

class CreateDogFactory extends Factory
{
    protected $animal;
    public static function createAnimal()
    {
        return new Dog();
    }
}


$cat = CreateCatFactory::createAnimal();
$cat->say();
$cat->run();

$dog = CreateDogFactory::createAnimal();
$dog->say();
$dog->run();




