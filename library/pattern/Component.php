<?php
/**
 * User: Andy
 * Date: 2018/12/12
 * Time: 13:50
 */

// 装饰器 模式
//
// 一般来说， 给一个对象或者类增加行为的方式可以有两种：
// 1. 继承机制： 通过继承一个现有类可以使得子类在拥有自身方法的同时还拥有父类的方法。
//      单是这个方法是静态的，用户不能控制增加行为的方式和时机
// 2. 关联机制： 即将一个类的对象嵌入另一个对象中，由另一个对象来决定是否调用切入对象的行为以便扩展自己的行为。
//      我们称这个嵌入的对象为装饰器 Decorator

// 通过使用装饰模式，可以在运行时扩充一个类的功能。原理是：
//    增加一个修饰类包裹原来的类，包裹的方式
//        一般是通过在将原来的对象作为修饰类的构造函数的参数
// 装饰器实现新的功能，但是，在不需要用到新功能的地方，他可以调用原来的类中的方法。修饰类必须 和原来的类有相同的接口

// 装饰模式是类继承的另一种选择。类继承在编译时增加行为，而装饰模式是在运行时增加行为

/**
 * Componment 抽象构件
 */
abstract class Component {
    abstract public function operation();
}

/**
 * Class MyComponent 具体构件
 */
class MyComponent extends Component
{
    public function operation()
    {
        echo "这是正常的组件方法 <br>";
    }
}


/**
 * Class Decorator 装饰抽象类
 */
abstract class Decorator extends Component
{
    protected $component;

    function __construct(Component $component)
    {
        $this->component = $component;
    }

    public function operation()
    {
        $this->component->operation();
    }
}

class MyDecorator extends Decorator
{
    function __construct(Component $component)
    {
        parent::__construct($component);
    }

    public function addMethod()
    {
        echo "这是装饰器添加的方法 <br>";
    }

    public function operation()
    {
        $this->addMethod();
        parent::operation();
    }
}

$component = new MyComponent();
$component->operation();

$da = new MyDecorator($component);
$da->operation();