<?php 

	/*class StrictCoordinateClass
	{
		private $arr = array('x' => NULL, 'y' => NULL);

		function __get($property)
		{
			if (array_key_exists($property, $this->arr)) {
				return $this->arr[$property];
			} else {
				print "Error: Cant't read a property other than x & y\n";
			}
		}

		function __set ($property, $value)
		{
			if (array_key_exists($property, $this->arr)) {
				$this->arr[$property] = $value;
			} else {
				print "Error: Cant't write a property other than x & y\n";
			}	
		}
	}

	$obj = new StrictCoordinateClass();
	$obj->x = 1;
	print $obj->x;

	print "\n";

	$obj->n=2;
	print $obj->n;*/

	/*class HelloWorld
	{
		function display($count)
		{
			for ($i=0; $i < $count; $i++) { 
				print "Hello World\n";
			}
			return $count;
		}
	}

	class HelloWorldDelegator 
	{
		function __construct()
		{
			$this->obj = new HelloWorld();
		}

		function __call($method, $args)
		{
			return call_user_func_array(array($this->obj, $method), $args);
		}

		private $obj;
	}

	$obj = new HelloWorldDelegator();
	print $obj->display(3);*/

	/*
		bool offsetExists($index)
		mixed offsetGet($index)
		void offsetSet($index, $new_value)
		void offsetUnset($index)
	 */
	class UserToSocialSecurity implements ArrayAccess
	{
		private $db; // 包含了数据库访问方法的对象

		function offsetExists($name)
		{
			return $this->db->userExists($name); 
		}

		function offsetGet($name)
		{
			return $this->db->getUserId($name);
		}

		function offsetSet($name, $id) 
		{
			$this->db->setUserId($name, $id);
		}

		function offsetUnset($name)
		{
			$this->db->removeUser($name);
		}
	}

	$userMap = new UserToSocialSecurity();

	print "John's ID number is ".$userMap["John"];






