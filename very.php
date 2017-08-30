<?php
session_start();
$img = imagecreatetruecolor(100, 40);//创建画布

$black = imagecolorallocate($img, 0x00, 0x00, 0x00);
$green = imagecolorallocate($img, 0x00, 0xFF, 0x00);
$white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
$red = imagecolorallocate($img, 0xFF, 0x00,0x00);

imagefill($img,0,0,$white);
//生成随机的验证码
// $code = '';
// for($i = 0; $i < 4; $i++) {
//     $code .= rand(0, 9);
// }
// $_SESSION['authcode'] = $code;//存入session
// imagestring($img, 5, 30, 15, $code, $black);

//加入字母数字验证码
// for($i = 0; $i < 4; $i++) {
//  $str="abcdefghkmnpwsert1234567890";
//  $sub=  substr($str,rand(0,strlen($str)),1);
//  $con.=$sub;
//  $x=($i*100/4)+rand(5,10);
//     $y=rand(5,10);
//  imagestring($img,10,$x,$y,$sub,$red);
// }

//加入汉字验证码
$fontface = 'Semibold.ttf';  
$str = "月日上午湖北荆州安良百货商场内一名岁的女子被搅入手扶电梯身亡据广西梧视台报道位多小朋友太阳从左到臂中段基本废掉全事关每个生命绝不允许万危险什么屡发吃故背后都有政府监管部门产者保养维护和所失职人祸原因民网亲带着孩溲卷目睹这幕如此悲情面估计无数潸然泪下终止竟孤偶让我䃽心于死来说羊补牢经而能褟庆幸自己没在那敲响实公共警钟底应该何做系乎寥成为话题密问其木起质疑鼚涌出赔偿缺却再也回才是最痛眰方运行既存就需要意识对拥否已尽了义务确正常转宣传尤进紧急制动样按钮播时候修些之众则件将会头尾答果任层现纰漏至重洞导致剧次以长鸣们注领域施与另外奏更平论家庭还学校给灌输各种救皋措办演练包含消防等容只够记像吝庥懂得示昌敪诌提前告知顾客通速及服推卸责兆历统谁望轻描淡写追甚负躺顶格惩罚期操汻怂王两天国股暴跌步把市脆弱性熟造陷表淋漓投资贪婪览遗见缝插针机想他考虑社利益牛弹琴大势文章称组织稽查执法力量集抛售票线索核同声明队根退可户恶空分析指变化跑海或谋工具星疾呼过仅街老鼠喊打使证高调处金融交易仓限許卖单临规透赚钱减敢地惹火烧三未合约主结算即沪深持增加张但仍例近萎缩比少沒恐慌沽現象并它移括香港新坡华富貨当较初份达涉总值元宠模吗年热炒作显著升傍晚点美超亿由且开始聚早嗜血放屠刀立佛晃取衍润几用极灾难况招拆狠宝马奥拓展拳脚击败攻举解预决强获纷逃直崩盘清楚";  
$strdb = str_split($str,3); 
$code = '';
for($i=0; $i<4; $i++) {
    $cn = $strdb[rand(0,count($strdb)-1)]; 
    $code .= $cn;
    
    imagettftext($img,mt_rand(14,20), mt_rand(-30,30), (15*$i+20), mt_rand(15,35),$black,$fontface,$cn);
    
}
$_SESSION['authcode'] = $code;
//存入session


//加入噪点干扰
for($i=0;$i<100;$i++) {
  imagesetpixel($img, rand(0, 100) , rand(0, 100) , $black); 
  imagesetpixel($img, rand(0, 100) , rand(0, 100) , $green);
  imagesetpixel($img, rand(0, 100) , rand(0, 100) , $red); 
}
//加入干扰线
for($j=0;$j<5;$j++){
    imageline($img, rand(0, 100) , rand(0, 100) , rand(0, 10) , rand(0, 100) , $black); 
    imageline($img, rand(0, 100) , rand(0, 100) , rand(0, 10) , rand(0, 100) , $green);
    imageline($img, rand(0, 100) , rand(0, 100) , rand(0, 10) , rand(0, 100) , $red);
}



//输出验证码
header("content-type: image/png");
imagepng($img);
imagedestroy($img);

?>
