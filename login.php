<?php include("config.php");?>
<?php include("head.php");?>
<?php
if(isset($_COOKIE['admin'])){
 header('location:blogadmin.php');
}else{
if($_POST){
$name=$_POST["user"];
$password=$_POST["password"];
$user="SELECT * FROM adminuser WHERE name='$name' ";
$username=$db->getrows($user);
if($username){
   foreach($username as $rs){
     if($rs['password']!="$password"){
       echo"密码错误";
       echo'<a href="login.php">点击登录</a>';
       return;

     }else{
       echo"登录成功";
       setcookie("admin","$name",time()+7200);
       header('location:blogadmin.php');
       return;
     }
   }
}else{
  echo"帐号错误或已被停用";
  return;
}
}else{
  include("adminlogin.html");
}
}

?>
</body>
</html>
