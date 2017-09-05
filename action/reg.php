<?php 

header("Content-type: text/html; charset=UTF-8");
error_reporting(0);// 关闭错误报告 

include('../connect.php');//引入数据库连接

//isset()检测变量是否设置
if(isset($_REQUEST['authcode'])){
    session_start();
    // echo $_POST['authcode'].'/'.$_SESSION['authcode'];
    // exit;
    //strtolower()小写函数
    if(strtolower($_POST['authcode']) == $_SESSION['authcode']){
        //跳转页面
        // echo "<script language=\"javascript\">";
        // echo "document.location=\"./reg.php\"";
        // echo "</script>";

        $uname = trim($_POST['uname']);
        $uemail = trim($_POST['uemail']);
        $upass = trim($_POST['upass']);
        $upass_two = trim($_POST['upass_two']);

        if (!$uname || !$uemail || !$upass) {
            # code...
            echo "<script language=\"javascript\">";
            echo "alert('输入框不能为空!');";
            echo "document.location=\"../reg.php\"";
            echo "</script>";
            exit;
        }
        if ($upass != $upass_two ) {
            # code...
            echo "<script language=\"javascript\">";
            echo "alert('两次密码输入不一致!');";
            echo "document.location=\"../reg.php\"";
            echo "</script>";
            exit;
        }

        if (!get_magic_quotes_gpc()) {
            # code...
            $uname = addslashes($_POST['uname']);
            $uemail = addslashes($_POST['uemail']);
            $upass = addslashes($_POST['upass']);
        }

        $conn = new PDO($dns,$user,$pass);
        $conn->query("set names utf8");//编码 
        $date = date('Y-m-d H:i:s');
        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//设置以异常的形式报错
        $conn ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC );//设置fetch时返回数据形式为数组
        $sql = "select * from users where uname='".$uname."'";
        $query = "insert into users values (NULL,'".$uname."','".$uemail."','".$upass."','".$date."')"; //插入id自增数据        
        $sel = $conn->prepare($sql);
        $rs = $sel->execute();
        if($sel->fetch()){
            echo "<script language=\"javascript\">";
            echo "alert('用户名已存在!');";
            echo "document.location=\"../reg.php\"";
            echo "</script>";
        }else{
            $ps = $conn->prepare($query);
            $res = $ps->execute(); //正式执行。
            
        }
        

        if ($res) {
            # code...
            echo "<script language=\"javascript\">";
            echo "alert('注册成功!');";
            echo "document.location=\"../login.php\"";
            echo "</script>";

        }else{
            echo "an error occurred";
        }

    }else{
        //提示以及跳转页面
        echo "<script language=\"javascript\">";
        echo "alert('验证码输入错误!');";
        echo "document.location=\"../reg.php\"";
        echo "</script>";
        exit;
    }
}

 ?>