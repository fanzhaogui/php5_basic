<?php
/**
 * User: Andy
 * Date: 2018/6/4
 * Time: 23:40
 */

/**
 * 异常处理 Exception Handling
 *
 *  try /catch / throw
 *
 *  try /catch /catch /catch
 *
 *  catch 执行 instanceof，抛出的错误
 */

## Exception 的结构
/*class Exception
{
    protected $message;
    protected $code;
    protected $file;
    protected $line;

    function __construct($message, $code);

    final public getMessage();
    final public getCode();
    final public getFile();
    final public getLine();
    final public getTrace();
    final public getTraceAsString();
}*/

### 例子

class NullHandleException extends Exception
{
    function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

    }
}

function printObject($obj)
{
    if($obj == NULL) {
        throw new NullHandleException("printObject recived NULL object");
    }

    print $obj . "<br>";
}


class MyName
{
    private $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function __toString()
    {
        return $this->name;
    }

}


try {
    printObject(new MyName("An"));
    printObject(NULL);
    printObject(new MyName("Bnb"));
} catch (NullHandleException $e) {
    echo $e->getMessage(), "<br>";
} catch (Exception $e) {
    // 这里讲不会执行
}


/*

1. 记住异常就是异常。你应该只使用它们来处理问题
2. 永远不要使用异常来控制流程
3. 异常应该只包含特定的错误信息，而且不应该包含影响获取处理器中流程控制和六级的参数

 */


























