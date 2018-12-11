<?php
/**
 * User: Andy
 * Date: 2018/12/10
 * Time: 19:15
 */

// 简单工厂模式
//
// 由工厂去创建所需要的类

class Cat
{
    function __construct()
    {
        echo "I am Cat class <br>";
    }
}

class Dog
{
    function __construct()
    {
        echo "I'm Dog class <br>";
    }
}

class Factory
{
    public static function CreateAnimal($name)
    {
        if($name == "cat") {
            return new Cat();
        } else if($name == "dog"){
            return new Dog();
        }
    }
}

$cat = Factory::CreateAnimal("cat");
$dog = Factory::CreateAnimal('dog');

