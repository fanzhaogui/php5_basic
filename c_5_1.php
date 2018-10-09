<?php
/**
 * User: Andy
 * Date: 2018/6/16
 * Time: 0:19
 */

/**
 * 错误处理
 *
 *  php.ini
 *
 *    log_errors
 *    display_errors
 *
 *  函数
 *
 *    set_error_handler()
 *
 *   错误处理函数应该这么定义
 *
 *   error_function($type, $error, $file, $line);
 *
 *   $type : 是指捕捉到的错误的类型， E_NOTICE / E_WARNING / E_USER_NOTICE / E_USER_WARNING / E_USER_ERROR
 *
 *   $error : 是指文本的错误信息，
 *
 *   $file 文件名
 *   $line 行数
 *
 *  一个用户定义的错误处理器将捕获所有的错误信息，即使error_reporting 错误级别告诉PHP并不是所有的错误都应该输出
 */


/* 5.9 架构

   1. 单一脚本相应所有的请求

    通常是index.php，可以处理所有针对不同页面的请求，不同的内容通过URL参数传递到index.php，

   伪码
 */

/*

foreach (directory in "modules/") {
    if(file_exists("definition.php")) {
        $module_def = include "definition";
        register_module(module_def);

    }
}


if registerd_module($_GET['module']) {
    $driver = new $_GET['module']
    $driver->execute();
}

*/

/*
    2 每个脚本负责一项功能 One Script per Function

    3 把业务逻辑与现实分离 Separating Logic from layout
 */
?>

/* 5.9.3 业务和逻辑分离 */

// template.tpl
<html>
<head><title><?php echo $tpl['title']; ?></title></head>
<body>
    <h1><?php echo $tpl['title']; ?></h1>
    <p>
        <?php echo $tpl['description']; ?>
    </p>
    <?php echo $tpl['content']; ?>
</body>
</html>


// list_parts.tpl.php
<?php
    $header = <<<END
    <table>
        <tr><th>Name</th><th>City</th></tr>
    </table>
END;

    $footer = <<<END
    
END;
    $item = "<tr><td>{name}</td><td>{city}</td></tr>";
?>

// show_names.php
<?php

    include 'list_parts.tpl.php';

    $list = array(
        'Andi'  => 'Tel',
        'Derick'=> 'Skien',
        'Stig'  => 'Trondheim'
    );
    $item = '';
    foreach ($list as $name => $city) {
        $item .= str_replace(
            array('{name}', '{city}'),
            array($name, $city),
            $item
        );
    }

    $tpl = array();
    $tpl['title'] = "this is title";
    $tpl['description'] = "this is descriptiondescriptiondescriptiondescription";
    $tpl['content'] = "this is contentcontentcontentcontent";
?>




