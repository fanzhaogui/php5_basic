<?php 

/**
 * 工厂
 */
class Algorithm
{
	
	public function __construct($functionName)
	{
		# code...
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