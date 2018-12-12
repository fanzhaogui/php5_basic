<?php
/**
 * User: Andy
 * Date: 2018/12/12
 * Time: 18:38
 */

// 中介者模式
//
//

class Mediator {

}

abstract class Colleague {
    protected $mediator;
    abstract public function sendMsg($who, $msg);
    abstract public function receiveMsg($msg);
    public function setMediator(Mediator $mediator) {
        $this->mediator = $mediator;
    }
}

