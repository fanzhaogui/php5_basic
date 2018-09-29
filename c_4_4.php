<?php
/**
 * User: Andy
 * Date: 2018/6/7
 * Time: 21:44
 */

/**
 * 映射 Reflection
 *
 *  也叫内观，这个特性可以实时地收集脚本信息；
 * 具体的说，你可以检查你的函数，类，等等。
 *
 */

// ReflectionClass::export("ReflectionParameter");

/**
 * 使用映射执行授权模式
 * Implementing the Delegation Pattern Using Reflection
 *
 */
class ClassOne
{
    function callClassOne()
    {
        print "In Class One <br>";
    }
}

class ClassTwo
{
    function callClassTwo()
    {
        print "In Class Two <br>";
    }
}

class ClassOneDelegator
{
    private $targets;

    function __construct()
    {
        $this->targets[] = new ClassOne();
    }

    function addObject($obj)
    {
        $this->targets[] = $obj;
    }

    function __call($name, $args)
    {
        foreach ($this->targets as $obj) {
            // ReflectionClass 类报告了一个类的有关信息。
            $r = new ReflectionClass($obj);
            try {
                // 类中是否有此方法 -- 如果类中不存在方法，会抛出ReflectionException异常
                if ($method = $r->getMethod($name)) {
                    // 是否为public的方法，是否为抽象
                    if ($method->isPublic() && !$method->isAbstract()) {
                        return $method->invoke($obj, $args);
                    }
                }
            } catch (ReflectionException $e) {
                echo $e->getMessage();
            }
        }
    }
}

$obj = new ClassOneDelegator();
$obj->addObject(new ClassTwo());
$obj->callClassOne();
$obj->callClassTwo();


/**
 * 总结 -- Summary
 *
 *   强烈建议阅读经典的设计模式书籍
 */






















