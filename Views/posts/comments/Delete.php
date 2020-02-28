<?php

if(isset($_GET['id'])){
    $connect=mysqli_connect("localhost","root","","fb");
    if($connect){
        echo "delete from posts where id='{$_GET['id']}'";
      $res=mysqli_query($connect,"delete from comments where id='{$_GET['id']}'");
if($res){
    echo "deleted";
    var_dump($_GET);
    echo"ftttttttttttttttt";
    echo $_GET['postId'];
    header("Location:../comments/addComment.php?id={$_GET['postId']}");

    // echo"select * from posts INNER JOIN comments ON post_id='{$_GET['id']}'";

    // $pos= mysqli_query($connect,"select * from posts INNER JOIN comments ON post_id='{$_GET['id']}'");
    // if($pos){
        // var_dump($pos);
    // };
}
    }else{
        echo "Error in delete";
    }
}
?>