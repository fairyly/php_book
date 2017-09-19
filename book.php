<?php 

include_once('header.php');
/*
*
header("Content-type: text/html; charset=UTF-8");
*
*/
if (isset($_SESSION['uname'])) {
    echo "<script language=\"javascript\">";
    echo "alert('请登录');";
    echo "document.location=\"./login.php\"";
    echo "</script>";
}
include_once('./action/booklist.php');

?>

<div class="booklist">
     <a href="./addbook.php">添加图书</a>
     <div class="list">
         <table>
             
            <?php
                
                $sels = $conn->prepare($pagesql);
                $rss = $sels->execute();
           
                // var_dump($sels->fetchAll(PDO::FETCH_ASSOC));//exit;
                $sels = $sels->fetchAll(PDO::FETCH_ASSOC);
                foreach ($sels as $key => $value) {
                    echo "<tr>";
                    echo "<td>".$value['id']."</td>";
                    echo "<td>".$value['isbn']."</td>";
                    echo "<td>".$value['author']."</td>";
                    echo "<td>".$value['title']."</td>";
                    echo "<td>".$value['catid']."</td>";
                    echo "<td>".$value['price']."</td>";
                    echo "<td>".$value['description']."</td>";
                    echo "<td><a href='modify.php?id=".$value['id']."'>修改</a></td>";
                    echo "<td><a href='del.php?id=".$value['id']."'>删除</a></td>";
                    echo "</tr>";
                }
            ?>
            <td width="40px"><a href="book.php?page=1">首页</a></td>        
              <td width="45px"><a href="book.php?page=<?php 
                if ($page <= 1) {
                    echo 1;
                }else {
                    echo intval($page) - 1;
                }

              ?>">上一页</a></td>
              
              <td width="45px"><a href="book.php?page=<?php 
              if($page == $pagecount){
                  echo $pagecount;
              }else{
                  echo $page+1;
              }
              ?>">下一页</a></td>
              <td width="40px"><a href="book.php?page=<?php echo $pagecount?>">尾页</a></td>
         </table>
     </div>
</div>

<?php 

include_once('footer.php');

?>