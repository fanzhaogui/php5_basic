<?php 

/**
 * 工厂
 */
class Algorithm
{

    private static $_instance = null;   //所有数据库连接句柄，可以区分不同的库

    private function __construct() {}

    private function __clone(){}

    public static function factory($server)
    {
        if (isset(self::$_instance[$server]) && !empty(self::$_instance[$server])) {
            return self::$_instance[$server];
        }

        $class = ucfirst($server);
        if (class_exists($class)) {
            self::$_instance[$server] = new $class;
        } else {
            // throw new Exception("不存在！");
            echo "不存在！";
        }
        return self::$_instance[$server];
    }
}

/**
 * 斐波拉契数列
 */
class Fibonacci
{
	protected $result = 0;
	protected $arr = [];

	public function getResult($times = 0)
	{
		for($i = 1; $i <= $times; $i ++) {
			echo $this->execAction($i)."\r\n";
		}
	}


	public function execAction($n) 
	{
		if ($n <= 0) {
			return 0;
		}

		################## 简单优惠
		if(array_key_exists($n, $this->arr)) {
			return $this->arr[$n];
		}
		#################
		
		if ($n <= 1) {
			$res = 1;
		} else {
			$res = self::execAction($n - 1) + self::execAction($n - 2);
		}

		################## 简单优惠
		if(!array_key_exists($n, $this->arr)) {
			$this->arr[$n] = $res;
		}
		#################
		
		return $res;
	}
}