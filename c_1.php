<?php
/**
 * Created by PhpStorm.
 * User: win7
 * Date: 2018/6/4
 * Time: 9:33
 */

/**
 * 抽象类
 *
 *  把类声明为抽象类，可以防止他被实例化，可以被继承；如基类
 *
 * 抽象方法
 *
 * 把方法声明为抽象的，以便在继承的子类中再去定义。 包含抽象类方法的类必须是抽象类
 *
 * 对象声明提示
 *
 *  对参数进行对象类型对象
 */
/*class MyClass{ }

function expectsMyClass(MyClass $obj)
{

}*/


/**
 * 异常处理
 *
 *  try... catch... throw
 *
 *  set_exception_hanle()
 */

/*class SQLException extends Exception
{
    public $problem;

    function __construct($problem)
    {
        $this->problem = $problem;
    }
}

try {
    throw new SQLException("couldn't connect to database");
} catch (SQLException $e) {
    print $e->problem;
} catch (Exception $e) {
    echo 'Caught unrecongnized exception ';
}*/

function exception_handler($exception)
{
    echo "Uncaught exception: " , $exception->getMessage(), "\n";
}

set_exception_handler('exception_handler');

throw new Exception('Uncaught Exception'); // 抛出异常，被exception_handler处理，并die();

echo "Not Executed\n";

/**
 * Tidy扩展
 * Perl扩展
 */

/* 第一章 完结 */