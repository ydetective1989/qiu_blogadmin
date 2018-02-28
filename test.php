<?php include("config.php"); ?>
<?php
if(isset($_POST)&&!empty($_POST)){
  extract($_POST);
  $query = "SELECT o.name as user,e.title as etit, e.id as eid, t.text as ttalk FROM user as o
  inner join editor as e on o.name = e.username
  inner join talk as t on e.id = t.pid
  WHERE e.username='$name' and o.hide =1  ";
  $is = $db->getRows($query);
  if($query){
    foreach($is as $row){
      echo $row['eid'];
      echo $row['user'];

      echo $row['ttalk'];
      echo "<br>";
    }
  }else{
    echo"没找到";
  }

}else{?>
  <form action="" method="post">
    <input type="text" name="name">
    <input type="submit" name="send" value="发送">
  </form>
<?php } ?>
