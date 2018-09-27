<?php
/**
 * User: Andy
 * Date: 2018/6/6
 * Time: 0:16
 */

/**
 * 设计模式 Design Patterns
 *
 *  在设计软件时，一些编程模式经常重复出现，
 * 他们中有一些已经被软件开发社区所认可，并且被加入到
 * 公认的常规解决方案中。
 *  这些不断重复的问题叫做设计模式。了解这些设计模式的好处不仅仅是节省全新开始的时间，
 * 而且还可以让软件的开发者之间有共同的语言。
 *
 *  如：单件模式，工厂模式...
 *
 *  策略模式经常跟工厂模式一起使用
 */


/**
 * 1. 策略模式 Strategy Pattern
 *
 *   Windows打开一个下载页面时：格式.zip
 *   其他打开时，.tar.gz
 */

abstract class FileNamingStrategy
{
    abstract function createLinkName($filename);
}

class ZipFileNamingStrategy extends FileNamingStrategy
{
    function createLinkName($filename)
    {
        return "https://download.com/$filename.zip";
    }
}

class TarGzFileNamingStrategy extends FileNamingStrategy
{
    function createLinkName($filename)
    {
        return "https://download.com/$filename.tar.gz";
    }
}

if(strstr($_SERVER["HTTP_USER_AGENT"], "Win")) {
    $filenameObj = new ZipFileNamingStrategy();
} else {
    $filenameObj = new ZipFileNamingStrategy();
}



/**
 * 2. 单间模式 Singleton Pattern
 *
 *  单件模式，可能是最著名的设计模式之一。
 */

class Logger
{
    static private $instance = NULL;

    static function getInstance()
    {
        if(self::$instance == NULL) {
            self::$instance = new Logger();
        }
        return self::$instance;
    }

    public function log($str)
    {
        echo $str;
    }

    private function __construct()
    {

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
}

Logger::getInstance()->log("Checkpoint");

/**
 * 这个模式的本质是Logger::getInstance()
 * 构造函数 和 克隆方法都被定义为 private，这么做的原因是为了防止开发
 * 者用new或者clone运算符错误地创建了第二个Logger类的实例
 */


/**
 * 3. 工厂模式 Factory Pattern
 *
 *  多态和基类的使用确实是OOP的核心， 但是，在一些阶段，你必须创建基类的一个具体实例。
 *
 *  一个工厂类拥有一个静态的方法，用来接收一些输入，并根据输入决定应该创建那个类的实例（通常是一个子类）
 */

abstract class User
{
    function __construct($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
    }

    // 权限方法
    function hasReadPermission()
    {
        return true;
    }

    function hasModifyPermission()
    {
        return false;
    }

    function hasDeletePermission()
    {
        return false;
    }

    // 定制方法
    function wantsFlashInterface()
    {

    }

    protected  $name = NULL;

}

class GuestUser extends User
{

}

class CustomerUser extends User
{
    function hasModifyPermission()
    {
        return true;
    }
}

class AdminUser extends User
{
    function hasModifyPermission()
    {
        return true;
    }

    function hasDeletePermission()
    {
        return true;
    }

    function wantsFlashInterface()
    {
        return false;
    }
}


class UserFactory
{
    private static $user = array(
        'Andi'      => 'admin',
        'Stig'      => 'guest',
        'Derick'    => 'customer',
    );

    static function Create($name)
    {
        if(!isset(self::$user[$name])) {
            echo "there is no person";
            return;
        }

        switch (self::$user[$name])  {
            case "guest" : return new GuestUser($name);
            case "customer" : return new CustomerUser($name);
            case "admin" : return new AdminUser($name);
            default://报错，用户类型不存在
        }
    }
}


function boolToStr($b)
{
    if ($b == true) {
        return "Yes\n";
    } else {
        return "NO\n";
    }
}

function displayPermission(User $obj)
{
    echo $obj->getName(), "'s permissions:\n";
    echo "Read: ", boolToStr($obj->hasReadPermission());
    echo "Modify: ", boolToStr($obj->hasModifyPermission());
    echo "Delete: ", boolToStr($obj->hasDeletePermission());
}

function displayRequirements(User $obj)
{
    if ($obj->wantsFlashInterface()) {
        echo $obj->getName(), " require Flash \n";
    }
}

$logins = array("Andi", "Stig", "Derick");

foreach ($logins as $login) {
    displayPermission(UserFactory::Create($login));
    displayRequirements(UserFactory::Create($login));
}


















