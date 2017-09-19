<?php 

header("Content-type: text/html; charset=UTF-8");
include_once('header.php');

if (isset($_SESSION['uname'])) {
    echo "<script language=\"javascript\">";
    echo "alert('请登录');";
    echo "document.location=\"./login.php\"";
    echo "</script>";
}

$id = $_GET['id'];
$page = $_GET['page'];

 ?>

<div class="bookadd">
    <form action="./action/del.php" method="post">
        <div><input type="hidden" name="id" placeholder="id"  value="<?php echo $id;?>"/></div>
        <div><a href="book.php?page=<?php echo $page;?>">取消</a></div>
        <div><input type="submit" value="删除"/></div>
        
    </form>
     
</div>
<?php 

include_once('footer.php');

?>