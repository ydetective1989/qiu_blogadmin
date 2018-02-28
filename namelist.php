<?php include("config.php");?>
<?php include("head.php"); ?>

<?php
if(isset($_COOKIE['admin'])){
$query="SELECT * FROM editor  ";
$rows = $db -> getpageRows ($query,10);
$list  = $rows["record"];
$page  = $rows["pages"];
if($rows){?>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
<legend>用户博客</legend>
</fieldset>
<div class="layui-form" style="width:900px">
<table class="layui-table">
<colgroup>
 <col width="30">
 <col width="100">
 <col width="100">
 <col width="200">
 <col width="100">
 <col width="70">
 <col width="70">
 <col>
</colgroup>
<thead>
 <tr>
   <th>用户名</th>
   <th>标题</th>
   <th>文章</th>
   <th>评论数</th>
   <th>是否删除</th>
   <th>删除</th>
 </tr>
</thead>
<?php foreach ($list as $row){
  $id=$row['id'];
  $total="SELECT COUNT(*) AS total FROM talk WHERE pid='$id' ";
  $total=$db->getrow($total);
  $total=$total['total'];?>
<tbody>
 <tr>
   <td><?php echo $row["username"];?></td>
   <td><?php echo $row["title"];?></td>
   <td><?php echo $row["blogtext"];?></td>
   <td><?php echo $total ;?></td>
   <td><?php echo $row["hide"];?></td>
   <td><a  class="layui-btn layui-btn-danger layui-btn-mini" onclick="change(<?php echo $row['id'] ;?>)" >删除</a></td>
 </tr>
</tbody>
<?php }
echo'</table>
</div>
<div class="layui-laypage">'. $page.'</div>';
}else{
echo"没有用户发布文章";

}?>
<script>
  function change(id){
        $.ajax({
          type: "GET",
          async: false,
          url: "blogdelete.php",
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
<?php }else{
  echo"请登录";
}?>
