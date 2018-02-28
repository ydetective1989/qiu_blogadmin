<?php
if(isset($_COOKIE['admin'])){
  setcookie("admin","",time()-7200);
  echo'<p>成功登出</p>';
  echo'<p><a href="login.php">点击跳转</a></p>';
  return;
}else{
  echo"已登出";
    echo'<p><a href="login.php">点击跳转</a></p>';
}
