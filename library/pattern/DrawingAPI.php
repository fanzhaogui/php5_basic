<?php
/**
 * User: Andy
 * Date: 2018/12/12
 * Time: 11:23
 */

// 桥接模式
//
// 它把 事物对象和其具体行为，具体特征
// 分离开来，使它们可以各自独立的变化
// 事物对象仅是一个抽象的概念。

// 如“圆形”、“三角形”归于抽象的“形状”之下，而“画圆”，“画三角”归于实现行为的“画图”类之下，
// 然后由“形状” 调用 “画图”

// 画图
interface DrawingAPI {
    // 画圆
    public function drawCircle($x, $y, $radius);
}

// 形状
interface Shape {
    public function draw(); // 画图
    public function resize($radius);
}


class DrawingAPI1 implements DrawingAPI
{
    public function drawCircle($x, $y, $radius)
    {
        echo "API1.circle at $x -- $y radius: $radius ". "<br>";
    }
}

class DrawingAPI2 implements DrawingAPI
{
    public function drawCircle($x, $y, $radius)
    {
        echo "API2.circle at $x -- $y radius: $radius ". "<br>";
    }
}

class CircleShape implements Shape
{
    protected $x;
    protected $y;
    protected $radius;
    private $drawingApi;
    function __construct($x, $y, $radius, $drawingAPI)
    {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
        $this->drawingApi = $drawingAPI;
    }

    public function draw()
    {
        $this->drawingApi->drawCircle($this->x, $this->y, $this->radius);
    }

    public function resize($radius)
    {
        $this->radius = $radius;
    }
}


$shape1 = new CircleShape(1, 2, 4, new DrawingAPI1());
$shape2 = new CircleShape(1, 2, 3, new DrawingAPI2());

$shape1->draw();
$shape2->draw();

$shape1->resize(10);
$shape1->draw();