<?php
/**
 * User: Andy
 * Date: 2018/9/30
 * Time: 14:57
 */

/* 性能 Performance */
// 性能的关键是巧妙，而不是特殊案例的集合。

/*

1 设计高性能的PHP应用
2 使用不同类型的缓存方法
3 对PHP代码进行性能分析
4 对代码和数据库进行优化
5 优化PHP本身
6 调节Web服务器和操作系统

*/

/*
压力测试

站点压力测试的工具： ApacheBench 和 Siege
http://www.joedog.org/siege/


性能分析

用Zend Studio的Profiler来分析性能
http://www.zend.com/store/products/zend-studio.php
: 它给你提供了重要的信息，包括你的应用中哪个部分使用了大部分的时间，你的应用的调用过程如何，每一个函数调用的次数是多少，等等。


APD进行性能分析 Advanced PHP Debugger


*/


/*
ZPS：Zend Performance Suite

1. 自动优化：Zend Optimizer，你不用做任何代码的修改就可以提高20%的性能；
2. 代码编译缓存：Zend Performance Suite的加上模块，可以提升50%-300%的性能，而且有些时候对于大多数应用来说甚至提升得更多。
3. 内容缓存：Zend Performance Suite的内容缓存模块，可以获得一个巨大的性能提升--而且从字面上说可以把你的应用的执行负载降到0 。实际上，这个功能获得10000%的性能提升（快100倍）也不是很罕见的。
4. 内容压缩： 虽然与所有前述的方法比起来略微有些不同，但是压缩你的内容（典型来说就是它的HTML部分）可以让你的应用看起来执行得更快，而且响应更迅速，因为页面将使用呢更少的时间在电路中传输。


*/



