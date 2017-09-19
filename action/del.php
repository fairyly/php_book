<?php 

header("Content-type: text/html; charset=UTF-8");
// error_reporting(0);// 关闭错误报告 

include('../connect.php');//引入数据库连接

//isset()检测变量是否设置

    $id = trim($_POST['id']);
    
    $conn = new PDO($dns,$user,$pass);
    $conn->query("set names utf8");//编码 
    $date = date('Y-m-d H:i:s');
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//设置以异常的形式报错
    $conn ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC );//设置fetch时返回数据形式为数组
    
    $query = "delete from books where id='".$id."'"; //修改对应id数据        

    $ps = $conn->prepare($query);
    $res = $ps->execute(); //正式执行。
    
    if ($ps->rowCount($ps,0,"total") != 0) {
        # code...
        echo "<script language=\"javascript\">";
        echo "alert('删除图书成功!');";
        echo "document.location=\"../book.php?page=1\"";
        echo "</script>";

    }else{
        echo "an error occurred";
    }

 ?>