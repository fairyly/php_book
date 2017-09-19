<?php 

header("Content-type: text/html; charset=UTF-8");
// error_reporting(0);// 关闭错误报告 

include('../connect.php');//引入数据库连接
session_start();
$uname = trim($_POST['uname']);
$upass = trim($_POST['upass']);


if (!$uname || !$upass) {
    # code...
    echo "<script language=\"javascript\">";
    echo "alert('输入框不能为空!');";
    echo "document.location=\"../login.php\"";
    echo "</script>";
    exit;
}

if (!get_magic_quotes_gpc()) {
    # code...
    $uname = addslashes($_POST['uname']);
    $upass = addslashes($_POST['upass']);
}

$_SESSION['uname'] = $uname;
$conn = new PDO($dns,$user,$pass);
$conn->query("set names utf8");//编码 

$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//设置以异常的形式报错
$conn ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC );//设置fetch时返回数据形式为数组
$sql = "select * from users where uname='".$uname."' and upass='".$upass."'";

$sel = $conn->prepare($sql);
$rs = $sel->execute();

// for($i=0; $row = $sel->fetch(); $i++){
//     echo $i." - ".$row['uname']."<br/>";
// }


// var_dump($row = $sel->fetch());
// exit;

if($sel->fetch()){
    echo "<script language=\"javascript\">";
    echo "document.location=\"../book.php?page=1\"";
    echo "</script>";
}else{
    echo "<script language=\"javascript\">";
    echo "alert('用户名或密码不正确!');";
    echo "document.location=\"../login.php\"";
    echo "</script>";
}

 ?>