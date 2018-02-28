<?php include("config.php");?>
<?php include ("head.php"); ?>
<?php
if(isset($_COOKIE['admin'])){
$mysql="SELECT *FROM user";
$rows = $db -> getpageRows ($mysql,10);
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
   <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
   <th>用户id</th>
   <th>用户名</th>
   <th>发帖功能</th>
   <th>评论功能</th>
<th>帐号封停</th>
 </tr>
</thead>
<?php
//统计每个用户发了多少帖子
foreach ($list as $row){ ?>
<tbody>
 <tr>
   <td><input type="checkbox" name="" lay-skin="primary"></td>
   <td><?php echo $row["id"];?> </td>
   <td><?php echo $row["name"];?></td>
   <td><?php echo $row["editor"];?><a  class="layui-btn layui-btn-danger layui-btn-mini" onclick="edi(<?php echo $row['id'] ;?>)" >文章</a></td>
   <td><?php echo $row["talk"];?><a  class="layui-btn layui-btn-danger layui-btn-mini" onclick="talk(<?php echo $row['id'] ;?>)" >评论</a></td>
   <td><?php echo $row["hide"];?><a  class="layui-btn layui-btn-danger layui-btn-mini" onclick="user(<?php echo $row['id'] ;?>)" >帐号</a></td>
 </tr>
</tbody>
<?php }?>
</table>
<div class="layui-laypage"><?php echo $page ;?></div>
</div>
<script>
  function talk(id){
        $.ajax({
          type: "GET",
          async: false,
          url: "talkadmin.php",
          data: "id="+id,
          success: function(ok){
              if(ok=="1"){
                   alert("操作成功！");
                   window.location.reload();
              }else{
                   alert(ok);
              }
            }
        });
      }
  </script>

<script>
  function edi(id){
        $.ajax({
          type: "GET",
          async: false,
          url: "editoradmin.php",
          data: "id="+id,
          success: function(ok){
              if(ok=="1"){
                   alert("操作成功！");
                   window.location.reload();
              }else{
                   alert(ok);
              }
            }
        });
      }
  </script>

<script>
  function user(id){
        $.ajax({
          type: "GET",
          async: false,
          url: "loginadmin.php",
          data: "id="+id,
          success: function(ok){
              if(ok=="1"){
                   alert("操作成功！");
                   window.location.reload();
              }else{
                   alert(ok);
              }
            }
        });
      }
  </script>

<?php
}else{
echo"没有用户";
}
}else{
  echo "请登录";
}?>
</body>
</html>
