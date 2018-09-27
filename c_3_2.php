<?php
/**
 * User: Andy
 * Date: 2018/6/4
 * Time: 22:35
 */

/**
 * 多态
 *
 *  OOP最重要的部分
 *  OOP不是简单的将函数和数据集合起来
 *  而是使用 类和继承 轻松地描述现实生活中的情况
 *  通过继承复用代码
 *  编写健壮的可扩展的代码，你通常需要尽量减少使用流程控制 如if等
 *
 * 多态将满足所有这些甚至更多的需求
 */

/*class Cat
{
    function miau()
    {
        echo "miau";
    }
}

class Dog
{
    function wuff()
    {
        echo "wuff";
    }
}

function printTheRightSound($obj)
{
    if($obj instanceof Cat) {
        $obj->miau();
    } else if($obj instanceof Dog) {
        $obj->wuff();
    } else {
        echo "Error:: Passed Wrong Kind of object";
    }
    echo "\n\r";
}

printTheRightSound(new Cat());
printTheRightSound(new Dog());*/

/**
 分析：如果我要牛、鸭、鹅... 叫，无疑要写若干个 else if () {} ...
 并且每次都要调用，发生的方法..

 如何简化？
 *
 多态，使用继承来解决这个问题

 继承所有父类的方法和属性，然后创建 “是一” 关系 -- 先看代码
 */

class Animal
{
    function makeSound()
    {
        echo "error: this method should bu re-implemend in the children";
    }
}

class Cat extends Animal
{
    function makeSound()
    {
        echo "mao";
    }
}

class Dog extends Animal
{
    function makeSound()
    {
        echo "wuff";
    }
}

function printTheRightSound($obj)
{
    if($obj instanceof Animal) {
        $obj->makeSound();
    } else {
        print "Error: ";
    }
    echo "\r\n";
}

printTheRightSound(new Cat());
printTheRightSound(new Dog());


## 扩散思维： 给Animal 和 其makeSound() 添加 abstract 修饰符
## 这不仅以为着，无需定义一些无意义的函数体
## 而且还可以强制由任何子类来实现它


/**
 * 关于 parent:: 和 self::
 *
 *  在任何需要的时候，确保尽可能使用这两个类名
 */


/**
 * instanceof 运算符
 */

/*class Rectangle
{
    public $name = __CLASS__;
}

class Square extends Rectangle
{
    public $name = __CLASS__;
}

class Circle
{
    public $name = __CLASS__;
}

function checkIfRectangle($shape)
{
    if($shape instanceof Rectangle) {
        echo $shape->name, "\r\n";
    }
}

checkIfRectangle(new Square());
checkIfRectangle(new Circle());*/

## instanceof 还检查一个对象是否执行了一个接口；是一 关系


/**
 * abstract 抽象
 */

abstract class Shape
{
    protected $x, $y;

    function setCenter($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    abstract function draw();
}

class Square extends Shape
{
    function draw()
    {
        // TODO: Implement draw() method.
    }
}

class Circle extends Shape
{
    function draw()
    {
        // TODO: Implement draw() method.
    }
}

/**
 * interfaces 接口
 *
 *  接口可以继承其他接口
 */





