<?php 
/**
 * Observer Pattern
 * 观察者模式
 */
interface Observer
{
	function notify($obj);
}

class ExchangeRate {
	static private $instance = NULL;
	private $observers = array();
	private $exchange_rate;

	private function __construct() {

	}

	static public function getInstance()
	{
		if (self::$instance == NULL) {
			self::$instance = new ExchangeRate();
		}
		return self::$instance;
	}

	public function getExchangeRate()
	{
		return $this->$exchange_rate;
	}

	public function setExchangeRage($new_rate) 
	{
		$this->exchange_rate = $new_rate;
		$this->notifyObserver();
	}

	public function registerObserver($obj)
	{
		$this->observers[] = $obj;
	}

	public function notifyObserver()
	{
		foreach($this->observers as $obj) {
			$obj->notify($this);
		}
	}
}

class ProductItem implements Observer
{
	public function __construct()
	{
		ExchangeRate::getInstance()->registerObserver($this);
	}

	public function notify ($obj) {
		if ($obj instanceof ExchangeRate) {
			// 更新交易率数据
			print "Received update!\n";
		}
	}
}


$product1 = new ProductItem();
$product2 = new ProductItem();

ExchangeRate::getInstance()->setExchangeRage(4.5);


