<?php
/**
 * User: Andy
 * Date: 2018/12/12
 * Time: 17:53
 */

// 命令模式 Command
//
// 发送命令的不需要知道谁直接命令
// 接收命令的不需要知道是谁发出的命令

// 主要的特点就是将一个请求封装为一个对象，从而使我们可用不同的请求进行参数化；对请求排队或者记录静秋日志，以及支持可撤销的操作。
// 命令行模式是一种对象行为型模式，其别名为动作action模式或事物transaction模式


class Receiver
{
    public function Action()
    {
        echo "Receiver->Action";
    }
}

abstract class Command {
    protected $receiver;
    function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }
    abstract public function Execute();
}

class MyCommand extends Command
{
    function __construct(Receiver $receiver)
    {
        parent::__construct($receiver);
    }

    public function Execute()
    {
        $this->receiver->Action();
    }
}

class Invoker
{
    protected $command;
    function __construct(Command $command)
    {
        $this->command = $command;
    }

    public function Invoke()
    {
        $this->command->Execute();
    }
}


$receiver = new Receiver();
$command = new MyCommand($receiver);
$invoker = new Invoker($command);
$invoker->Invoke();