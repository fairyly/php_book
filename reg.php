<?php 

include_once('header.php');
?>

<div class="reg-contain">
    <h1>用户注册</h1>
    <div class="reg-form">
        <form action="./action/reg.php" method="post">
            <div><input type="text" name="uname" placeholder="用户名" /></div>
            <div><input type="email" name="uemail" placeholder="邮箱" /></div>
            <div><input type="password" name="upass" placeholder="密码" /></div>
            <div><input type="password" name="upass_two" placeholder="确认密码" /></div>
            <div><input type="text" name="authcode" placeholder="验证码" ><img id="captcha_img" border='1' src='./very.php?r=echo rand(); ?>'  />
                <a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='./very.php?r='+Math.random()">换一个?<a></div>
            <div><input type="submit" value="注册"/></div>
            <div><span>已经已经有账号了?请</span><a href="./login.php">立即登录</a></div>
        </form>
    </div>
</div>


<?php 

include_once('footer.php');
?>