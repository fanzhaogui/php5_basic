<?php
/**
 * User: Andy
 * Date: 2018/6/5
 * Time: 23:58
 */












































/**
 * 数组语法访问的重载
 *
 * ArrayAccess
 *
 *  bool offsetExists($index)
 *  mixed offsetGet($index)
 *  void offsetSet($index, $new_value)
 *  void offsetUnset($index)
 *
 */

class obj implements ArrayAccess
{
    private $container = array();

    public function __construct()
    {
        $this->container = array(
            "one" => 1,
            "two" => 2,
            "three" => 3,
        );
    }

    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
}


$obj = new obj;

var_dump(isset($obj["two"]));
var_dump($obj["two"]);
unset($obj["two"]);
var_dump(isset($obj["two"]));
$obj["two"] = "A value";
var_dump($obj["two"]);
$obj[] = 'Append 1';
$obj[] = 'Append 2';
$obj[] = 'Append 3';
print_r($obj);




























