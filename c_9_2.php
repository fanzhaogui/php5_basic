<?php
/**
 * User: Andy
 * Date: 2018/9/29
 * Time: 20:37
 *
 *  第9章 主流扩展
 *
 *  重要的事情是不停止质疑！
 */

/**
 * 日期
 */

//$day = gettimeofday();

//var_dump($day);


/**
 * GD 库
 */
$code = isset($_GET['code']) && empty($_GET['code']) ? $_GET['code'] : 'IMOJI';
$code = substr($code, 0 , 8);

$size_x = 200;
$size_y = 75;
$space_per_char = $size_x / (strlen($code) + 1);

$img = imagecreatetruecolor($size_x, $size_y);

$bg = imagecolorallocate($img, 255, 255, 255);

$border = imagecolorallocate($img, 128, 128,128);
$colors[] = imagecolorallocate($img, 128, 64,192);
$colors[] = imagecolorallocate($img, 192, 64,128);
$colors[] = imagecolorallocate($img, 108, 192,64);

/*填充背景*/
imagefilledrectangle($img, 1, 1, $size_x - 2, $size_y - 2, $bg);
imagerectangle($img, 0, 0, $size_x - 1, $size_y - 1, $border);

/*文本*/
for ($i = 0; $i < strlen($code); $i++) {
    $color = $colors[$i % count($colors)];
    imagettftext(
      $img,
      28 + rand(0, 8),
      -20 + rand(0, 40),
        ($i + 0.3) * $space_per_char,
      50 + rand(0, 10),
      $color,
      'static/msyh.ttf',
      $code{$i}
    );
}

/* 增加一些随机变形处理 */
imageantialias($img, true);

/* 干扰项 */
for ($i = 0; $i < 1000; $i++) {
    $x1 = rand(5, $size_x - 5);
    $y1 = rand(5, $size_y - 5);
    $x2 = $x1 - 4 + rand(0, 8);
    $y2 = $y1 - 4 + rand(0, 8);
    imageline($img, $x1, $y1, $x2, $y2,
        $colors[rand(0, count($colors) - 1)]
    );
}

/* output */
header('Content-type: image/png');
imagepng($img);



