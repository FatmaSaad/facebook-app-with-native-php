<?php

if(isset($_GET['id'])){
    $connect=mysqli_connect("localhost","root","","fb");
    if($connect){
        echo "delete from posts where id='{$_GET['id']}'";
      $res=  mysqli_query($connect,"delete from posts where id='{$_GET['id']}'");
if($res){
    echo "deleted";
    var_dump($_GET);
    header("Location:../List/list.php");
}
    }else{
        echo "Error in delete";
    }
}
?>