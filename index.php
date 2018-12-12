<?php 
require_once "algorithm/fibonacci.php";
//require_once "library/pattern/simpleFactory.php";
//require_once "library/pattern/Component.php";
//require_once "library/pattern/Facade.php";
//require_once "library/pattern/FlyWeight.php";
//require_once "library/pattern/Proxy.php";
require_once "library/pattern/Command.php   ";






$fibonacci = Algorithm::factory("Fibonacci");
$fibonacci->getResult(3);



