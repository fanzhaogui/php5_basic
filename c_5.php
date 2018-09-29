<?php
/**
 * User: Andy
 * Date: 2018/6/9
 * Time: 11:11
 */

/**
 * How to Write Web Application with PHP
 *
 *  1. 如何把PHP嵌入HTML文件当中 （略）
 *  2. 如何通过HTML的表单收集用户的信息（略）
 *  3. 常见攻击Web站点的方法和相应的防护技术。
 *  4. 如何处理用户输入造成的错误
 *  5. 两种保持数据在应用中连续可用的方法：cookie和session
 *  6. 如何通过HTML表单从用户端收集数据文件
 *  7. 如何组织Web应用
 */


/*对用户的数据进行安全验证

1. 全局变量

  在包含任何一个PHP文件的时候， 要先确认在本地服务器是否存在该文件

    if (file_exists($module . '.php' )) {

        include $module. '.php';
    }

2. 跨站运行脚本


3. SQL 注入


*/



// addslashes(); // 作用与特殊字符
// strip_tags(); // 处理标签


// (int)$_GET['integer']; // 接收到的整形，强制转化
// 如果有很多这样的变量，你就需要对每一个变量都做转换操作；
// 从而让你的代码过于冗长
// 这个时候你可能就需要为此创建一个函数了

function sanitize_vars(&$vars, $signatures, $redir_url = null)
{
    $tem = array();
    foreach ($signatures as $name => $sig) {
        if(!isset($vars[$name]) && isset($sig['required'])) {
            /* 如果变量在数组中不存在，则重定向 */
            if($redir_url) {
                header("Location: $redir_url ");;
            } else {
                echo 'Parameter $name not present and';
            }
            exit();
        }
        /* 把类型运用到变量中 */
        $tmp[$name] = $vars[$name];
        if(isset($sig['type'])) {
            settype($tmp[$name], $sig['type']);
        }

        /* 用指定函数对变量进行操作，可以使用标准的PHP函数，或者使用自己定义的函数  */
        if(isset($sig['function'])) {
            $tmp[$name] = $sig['function']($tmp[$name]);
        }
    }
    $vars = $tmp;
    return $vars;
}

$sigs = array(
    'prod_id' => [
        'required' => true, 'type' => 'int',
    ],
    'desc' => [
        'required' => true, 'type' => 'string', 'function' => 'addslashes'
    ],
);

$params = sanitize_vars($_GET, $sigs, "http://{$_SERVER['SERVER_NAME']}/php5_basic/index.php?cause=vars");

var_dump($params);
















