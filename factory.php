<?php 

abstract class User 
{
	function __construct($name)
	{
		$this->name = $name;
	}

	function getName()
	{
		return $this->name;
	}

	// 权限方法
	function hasReadPermisson()
	{
		return true;
	}

	function hasModifyPermisson()
	{
		return false;
	}

	function hasDeletePermisson()
	{
		return false;
	}

	// 定制的方法
	function wantsFlashInterface()
	{
		return true;
	}

	protected $name = NULL;
}

class GuestUser extends User
{

}

class CustomerUser extends User
{
	function hasModifyPermission()
	{
		return ture;
	}
}

class AdminUser extends User
{
	function hasModifyPermission()
	{
		return true;
	}

	function hasDeletePermission()
	{
		return true;
	}

	function wantsFlashInterface()
	{
		return false;
	}
}

class UserFactory
{
	private static $users = array(
			"Andi" => "admin",
			"Stig" => "guest",
			"Derick" => "customer"
		);

	static function Create($name)
	{
		if(!isset(self::$users[$name])) {
			// 爆出错误，因为用户不存在
		}

		switch (self::$users[$name]) {
			case 'guest':
				return new GuestUser($name);
				break;
			case 'customer':
				return new CustomerUser($name);
				break;
			case 'admin':
				return new AdminUser($name);
				break;
			default:
				# 报错，因为用户类型不存在
				break;
		}
	}
}

function boolToStr($b)
{
	if($b == true) {
		return "YES\r\n";
	} else {
		return "NO\r\n";
	}
}

function displayPermissions(User $obj)
{
	print $obj->getName() . "'s permissions:\r\n";
	print "Read：" . boolToStr($obj->hasReadPermisson());
	print "Modify：" . boolToStr($obj->hasModifyPermisson());
	print "Delete：" . boolToStr($obj->hasDeletePermisson());
}

function displayRequirements(User $obj)
{
	if ($obj->wantsFlashInterface()) {
		print $obj->getName() . "requires Flas\r\n";
	}
}

$logins = array("Andi", "Stig", "Derick");

foreach ($logins as $login) {
	displayPermissions(UserFactory::Create($login));
	displayRequirements(UserFactory::Create($login));
}

echo "rwer \r\n 123";