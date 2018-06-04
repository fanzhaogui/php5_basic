<?php
/**
 * User: Andy
 * Date: 2018/6/4
 * Time: 15:10
 */

/**
 * 第三章 面向对象
 *
 * 高级的思想必须要一个高级的语言
 *
 * 1. OO模型的基础
 * 2. 对象的创建和生命周期及如何去控制
 * 3. 三种主要主要的访问限制关键字
 * 4. 使用类继承的好处
 * 5. 成功吹异常的小技巧
 */

/**
 * 对象的基本组成
 *
 *  属性 （变量）
 *  方法  （函数）
 */
class Person
{
    private $name;

    function setName($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
    }
}

/**
 * 静态属性
 *
 *  用static关键字定义的
 *
 *  和常规属性不一样的是， 这些属性属于类本身而不属于类的任何实例。也可以把静态属性认为是存储在类当中的全局变量
 * 而且你可以在任何地方通过类来访问。
 *
 *  内部访问： self
 *
 *  外部访问： 类名::属性名
 */

class MyClass
{
    static $myStaticVariable;
    static $myInitializedStaticVariable = 0;

    public function test()
    {
        echo self::$myInitializedStaticVariable;
    }
}

echo MyClass::$myInitializedStaticVariable;
$m = new MyClass();
$m->test();
echo "<hr>";
/**
 * 例：通过静态属性，把一个唯一的ID传递到类的所有实例中
 */
class MyUniqueIdClass
{
    static $idCounter = 0;

    public $uniqueId;

    function __construct()
    {
        self::$idCounter++;
        $this->uniqueId = self::$idCounter;
    }
}

$obj1 = new MyUniqueIdClass();
echo $obj1->uniqueId . "\n\r";

$obj2 = new MyUniqueIdClass();
echo $obj2->uniqueId . "\r\n";


/**
 * 类的常量
 *
 *  与静态成员类似，他们属于类本身而不是类的实例
 *  类的常量总是对大小写敏感
 *  访问类中的常量跟访问静态成员是类似的
 */
class MyColorClass
{
    const RED = "red";
    const GREEN = 'green';
    const BLUE = 'blue';

    function printBlue()
    {
        echo self::BLUE, "\r\n";
    }
}

echo MyColorClass::RED, "\r\n";

$objc = new MyColorClass();
$objc->printBlue();

/**
 * 克隆
 */
class CloneClass
{
    public $v = 1;
}

$objjc = new CloneClass();

$objjc2 = $objjc;
$objjc2->var = 2;

echo $objjc->var,"\r\n"; // 结果会是多少？？

/**
 * $objjc 是一个对象句柄，它的id号
 * 所以复制到$objjc2的是一个句柄
 * 因此，当改变$objjc2的值的时候，你其实已经改变了$objjc指向的同一个对象
 */
