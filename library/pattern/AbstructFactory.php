<?php
/**
 * User: Andy
 * Date: 2018/12/10
 * Time: 19:34
 */

interface TV{
    public function open();
    public function watch();
}

class HaierTv implements TV
{
    public function open()
    {
        // TODO: Implement open() method.
    }

    public function watch()
    {
        // TODO: Implement watch() method.
    }
}

interface PC {
    function work();
    function play();
}

class LenovoPc implements PC
{
    public function work()
    {
        // TODO: Implement work() method.
    }

    public function play()
    {
        // TODO: Implement play() method.
    }
}


#####################

abstract class Factory {
    abstract public static function createPc();
    abstract public static function createTv();
}

class ProductFactory extends Factory
{
    public static function createPc()
    {
        return new LenovoPc();
    }

    public static function createTv()
    {
        return new HaierTv();
    }
}



$newTv = ProductFactory::createTv();
$newPc = ProductFactory::createPc();

$newPc->play();
$newPc->work();

$newTv->open();
$newTv->watch();
