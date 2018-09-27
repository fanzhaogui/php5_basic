<?php 

// ReflectionClass::export("ReflectionParameter");

class ClassOne
{
	function callClassOne() 
	{
		print "In Class One\n";
	}
}

class ClassTwo 
{
	function callClassTwo()
	{
		print "In Class Two\n";
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
		var_dump($this->targets);
		foreach ($this->targets as $obj) {
			$r = new ReflectionClass($obj);
			// echo ($obj instanceof ClassTwo);
			var_dump($obj);
			echo $name . '<br/>';
			if ($method = $r->getMethod($name)) {
				if ($method->isPublic() && !$method->isAbstract()) {
					return $method->invoke($obj, $args);
				}
			}
		}
	}
}

$obj = new ClassOneDelegator();
$obj->addObject(new ClassTwo());
$obj->callClassOne();
$obj->callClassTwo();