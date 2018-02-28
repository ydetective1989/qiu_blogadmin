<?php include("config.php");?>
<?php include ("head.php"); ?>
<?php
if(isset($_COOKIE['admin'])){
$query="SELECT * FROM user  ";
$rows = $db -> getpageRows ($query,10);
$list  = $rows["record"];
$page  = $rows["pages"];
if($rows){
?>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
<legend>注册用户资料</legend>
</fieldset>

<div class="layui-form" style="width:900px">
<table class="layui-table">
<colgroup>
 <col width="50">
 <col width="150">
 <col width="150">
 <col width="100">
 <col>
</colgroup>
<thead>
 <tr>
   <th>用户名</th>
   <th>电话</th>
   <th>邮箱</th>
   <th>性别</th>
   <th>博客数</th>
 </tr>
</thead>
<?php

//统计每个用户发了多少帖子
foreach ($list as $row){
  $name=$row['name'];
  $count="SELECT count(*) as count FROM  editor WHERE username='$name' AND hide=1 ";
  $total=$db->getrow($count);
  $total=$total['count'];
echo'<tbody>
 <tr>';
   echo '<td>'. $row["name"]. '</td>';
   echo '<td>'. $row["phone"]. '</td>';
   echo '<td>'. $row["email"]. '</td>';
 echo '<td>'. $row["sex"]. '</td>';
 echo '<td>'.$total.'</td>';
echo'</tr>
</tbody>';
}

echo"</table>";
echo'<div class="layui-laypage">'. $page."</div>";
echo"</div>";
}else{
echo"没有用户";
}
}else{
  echo"请登录";
}?>
