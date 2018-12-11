<?php 
require_once "algorithm/fibonacci.php";
require_once "library/pattern/simpleFactory.php";








$fibonacci = Algorithm::factory("Fibonacci");
$fibonacci->getResult(3);



