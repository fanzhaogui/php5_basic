<?php
/**
 * User: Andy
 * Date: 2018/12/12
 * Time: 10:31
 */

class Singleton
{
    private static $instance;
    private function __construct(){}
    private function __clone() {}

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function say()
    {
        echo "这是用单例模式创建对象实例 <br/>";
    }

    public function operation()
    {
        echo "这里可以添加其他方法和操作 <br/>";
    }
}

$single = Singleton::getInstance();
$single->say();
$single->operation();

$newSingle =Singleton::getInstance();
var_dump($single === $newSingle);