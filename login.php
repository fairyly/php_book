<?php 

include_once('header.php');
?>


<div class="login-form">
    <h1>用户登录</h1>
    <form action="./action/login.php" method="post">
        <div><input type="text" name="uname"/></div>
        <div><input type="password" name="upass"/></div>
        <div><input type="submit" value="登录"/></div>
    </form>

    <div><span></span><a href="./reg.php">立即注册</a></div>
</div>

<?php 

include_once('footer.php');
?>