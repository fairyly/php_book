<?php 

include_once('header.php');

?>

<div class="bookadd">
    <form action="./action/addbook.php" method="post">
        <div><input type="text" name="isbn" placeholder="isbn" /></div>
        <div><input type="text" name="author" placeholder="作者" /></div>
        <div><input type="text" name="title" placeholder="书名" /></div>
        <div><input type="number" name="catid" placeholder="类别" /></div>
        <div><input type="text" name="price" placeholder="价格"></div>
        <div><input type="textarea" row="5" name="description" placeholder="描述"></div>
        <div><input type="submit" value="添加"/></div>
        
    </form>
     
</div>

<?php 

include_once('footer.php');

?>