<?php
/**
 * User: Andy
 * Date: 2018/6/7
 * Time: 0:47
 */

/**
 * 观察者模式  Observer Pattern
 *
 *  观察者模式 允许对象注册到一个特定的时间和/或者数据，当这个事件发生和数据发生改变时，它会自动通报;
 * 一个对象想要“可观察”， 通常需要一个注册方法，让这个观察者对象可以注册自己。
 */

interface Observer
{
    function notify($obj);
}

// 汇率计算的例子
class ExchangeRate
{

}
