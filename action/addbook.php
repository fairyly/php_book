<?php 

header("Content-type: text/html; charset=UTF-8");
// error_reporting(0);// 关闭错误报告 

include('../connect.php');//引入数据库连接

//isset()检测变量是否设置


    // echo $_POST['authcode'].'/'.$_SESSION['authcode'];
    // exit;
    //strtolower()小写函数
    
        //跳转页面
        // echo "<script language=\"javascript\">";
        // echo "document.location=\"./reg.php\"";
        // echo "</script>";

        $isbn = trim($_POST['isbn']);
        $author = trim($_POST['author']);
        $title = trim($_POST['title']);
        $catid = trim($_POST['catid']);
        $price = trim($_POST['price']);
        $description = trim($_POST['description']);

        if (!$isbn || !$author || !$title || !$catid || !$price || !$description) {
            # code...
            echo "<script language=\"javascript\">";
            echo "alert('输入框不能为空!');";
            echo "document.location=\"../addbook.php\"";
            echo "</script>";
            exit;
        }
        

        if (!get_magic_quotes_gpc()) {
            # code...
            $isbn = addslashes($_POST['isbn']);
            $author = addslashes($_POST['author']);
            $title = addslashes($_POST['title']);
            $catid = addslashes($_POST['catid']);
            $price = addslashes($_POST['price']);
            $description = addslashes($_POST['description']);
        }

        $conn = new PDO($dns,$user,$pass);
        $conn->query("set names utf8");//编码 
        $date = date('Y-m-d H:i:s');
        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//设置以异常的形式报错
        $conn ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC );//设置fetch时返回数据形式为数组
        $sql = "select * from books where $isbn='".$isbn."'";
        $query = "insert into books values (NULL,'".$isbn."','".$author."','".$title."','".$catid."','".$price."','".$description."')"; //插入id自增数据        
        $sel = $conn->prepare($sql);
        $rs = $sel->execute();

        // var_dump($sel->rowCount($sel,0,"total"));
        // exit;
        if($sel->rowCount($sel,0,"total") != 0){
            echo "<script language=\"javascript\">";
            echo "alert('这本书已存在!');";
            echo "document.location=\"../book.php\"";
            echo "</script>";
        }else{
            $ps = $conn->prepare($query);
            $res = $ps->execute(); //正式执行。
            
        }
        

        if ($res) {
            # code...
            echo "<script language=\"javascript\">";
            echo "alert('添加图书成功!');";
            echo "document.location=\"../book.php\"";
            echo "</script>";

        }else{
            echo "an error occurred";
        }

    


 ?>