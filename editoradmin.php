<?php include('config.php') ;?>
<?php
  if(isset($_COOKIE['admin'])){
  if($_GET){
  $id=$_GET['id'];
  $delete="SELECT * FROM user WHERE id = '$id' AND editor = 1 ";
  $query=$db->getRow($delete);
  if($query){
  $arr = array(
       "editor" => 0
  );
  $where = array(
    "id" => $id
  );
  $db->update("user",$arr,$where);
     echo "1";
  }else{
    $arr = array(
         "editor" => 1
    );
    $where = array(
      "id" => $id
    );
    $db->update("user",$arr,$where);
    echo "1";
  }
  }
  }else{
  echo"请登录";
}
?>
