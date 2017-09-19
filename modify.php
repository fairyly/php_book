<?php 

header("Content-type: text/html; charset=UTF-8");
include_once('header.php');
include('./connect.php');//引入数据库连接
$conn = new PDO($dns,$user,$pass);
$conn->query("set names utf8");//设置编码 
$conn->exec("set names utf8");

$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//设置以异常的形式报错
$conn ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC );//设置fetch时返回数据形式为数组

$id = trim($_GET['id']);

$sql = "select isbn,author,title,catid,price,description from books where id='".$id."'";
// $query = "update books set author='".$author."',title='".$title."',price='".$price."' where isbn='".$id."'";
$sel = $conn->prepare($sql);
$rs = $sel->execute();

$cols = $sel->fetchAll();

 ?>
<div class="bookadd">
    <form action="./action/modify.php" method="post">
        <div><input type="hidden" name="id" placeholder="id"  value="<?php echo $id;?>"/></div>
        <div><input type="text" name="isbn" placeholder="isbn"  value="<?php echo $cols[0]['isbn'];?>"/></div>
        <div><input type="text" name="author" placeholder="作者"  value="<?php echo $cols[0]['author'];?>"/></div>
        <div><input type="text" name="title" placeholder="书名"  value="<?php echo $cols[0]['title'];?>"/></div>
        <div><input type="number" name="catid" placeholder="类别"  value="<?php echo $cols[0]['catid'];?>"/></div>
        <div><input type="text" name="price" placeholder="价格" value="<?php echo $cols[0]['price'];?>"></div>
        <div><input type="textarea" row="5" name="description" placeholder="描述" value="<?php echo $cols[0]['description'];?>"></div>
        <div><input type="submit" value="修改"/></div>
        
    </form>
     
</div>

<?php 

include_once('footer.php');

?>