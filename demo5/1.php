<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

    /* 如果是 4 月  1 日， 我们现实一个引言 */
    if(date('md') == '0401') {
        echo 'A bookstore is one of the only pieces of evidence we have ',
        'that people are still thinking <i> Jerry Seinfeld </i>';
    } else {
        echo "Good morning!";
    }

?>
</body>
</html>