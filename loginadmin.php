<?php include('config.php') ;?>
<?php
if($_GET){
$id=$_GET['id'];
$delete="SELECT * FROM user WHERE id = $id AND hide = 1 ";
$query=$db->getrow($delete);
if($query){
$arr = array(
     "hide" => 0
     ,"editor" => 0
     ,"talk" =>0
);
$where = array(
  "id" => $id
);
$db->update("user",$arr,$where);
   echo "1";
}else{
  $delete="SELECT * FROM user WHERE id = $id AND hide = 0 ";
  $arr = array(
       "hide" => 1
       ,"editor" => 1
       ,"talk" =>1
  );
  $where = array(
    "id" => $id
  );
  $db->update("user",$arr,$where);
   echo "1";
}
}

?>
