<?php 

header("Content-type: text/html; charset=UTF-8");
// error_reporting(0);// 关闭错误报告 

$pagesize = 2;//设置每页显示2个记录
$page; //当前页数

if(@isset($_GET[page])){
    $page = (int)$_GET['page']; //获取页数
}else {
    $page = 1;
}

include('./connect.php');//引入数据库连接
$conn = new PDO($dns,$user,$pass);
$conn->query("set names utf8");//设置编码 
$conn->exec("set names utf8");

$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//设置以异常的形式报错
$conn ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC );//设置fetch时返回数据形式为数组
$sql = "select * from books";

$sel = $conn->prepare($sql);
$rs = $sel->execute();

$total = $sel->rowCount($sel,0,"total");//查询总数
$pagecount = (int)ceil($total/$pagesize);//计算总页数


// echo $total.'/'.$pagecount;exit;
$from = ($page-1)*$pagesize; // 分页计算，从第几个开始

$pagesql = "select * from books limit $from,$pagesize";


?>