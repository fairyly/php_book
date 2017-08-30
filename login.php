<?php 

include_once('header.php');
?>


<div class="login-form">
    <h1>用户登录</h1>
    <form action="" method="post">
        <div><input type="text" name="uname"/></div>
        <div><input type="password" name="upass"/></div>
        <div><input type="submit" value="登录"/></div>
    </form>

    <div><span>未注册，请</span><a href="./reg.php">点击注册</a></div>
</div>

<?php 

include_once('footer.php');
?>