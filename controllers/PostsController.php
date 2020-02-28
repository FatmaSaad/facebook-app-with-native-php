<?php
$errorArray = [];
$connect = mysqli_connect("localhost", "root", "", "fb");


session_start();
if(isset($_SESSION['id'])){
    $sessID= $_SESSION['id'];
     //echo $sessID ;
}else{
    echo "NUll";
}

if (isset($_POST['Add'])) {

    if ($connect) {
        var_dump($_POST);
        if (!isset($_POST['post']) || empty($_POST['post'])) {

            $errorArray[] = "post";
        }

        if (count($errorArray) > 0) {

            header("Location:Add.php?error=" . implode(",", $errors));
        } else {


            $body = mysqli_escape_string($connect, $_POST['post']);
            $imagesFile = "public/imags";
            $tmpFile = $_FILES["image"]["tmp_name"];
            $imageName = $_FILES["image"]["name"];
            echo $tmpFile;
            echo "<br/>";
            echo $imagesFile . "/" . $imageName;
            echo "<br/>";
            var_dump($_FILES);

            if (move_uploaded_file($tmpFile, $imagesFile . "/" . basename($imageName))) {
                echo "Done ...";
            } else {
                echo "<pre>";
                var_dump($_FILES);
                echo "</pre>";
                echo "Error in upload emp pic ....";
                exit;
            }
            $AddPost = mysqli_query($connect, "insert into posts set body='$body',user_id='{$_SESSION['id']}',img_url='{$imageName}'");
            var_dump($AddPost);
            var_dump("insert into posts set body='$body',user_id='{$user_id}',img_url='{$imageName}'");

            if ($AddPost) {
                echo "added";
                header("Location:../views/posts/List/List.php");
            } else {
                echo "cant add";
            }
        }
    } else {
        echo (" can not connected");
    }
} else if (isset($_POST['update'])) {
    var_dump($_POST);
    $body = mysqli_escape_string($connect, $_POST['post']);
    $PostId = mysqli_escape_string($connect, $_POST['PostId']);
    $imagesFile = "public/imags";
    $tmpFile = $_FILES["image"]["tmp_name"];
    $imageName = $_FILES["image"]["name"];
    //echo $tmpFile;
    echo "<br/>";
    //echo $imagesFile . "/" . $imageName;
    echo "<br/>";
   // var_dump($_FILES);

    if (move_uploaded_file($tmpFile, $imagesFile . "/" . basename($imageName))) {
        echo "Done ...";
    } else {
        echo "<pre>";
        //var_dump($_FILES);
        echo "</pre>";
        echo "Error in upload emp pic ....";
        exit;

    }


    $result = mysqli_query($connect, "update posts set body='$body',img_url='{$imageName}',user_id='{$_SESSION['id']}'where id='$PostId'");
echo $result;
    if ($result) {
        echo "updated";
        header("Location:../views/posts/List/List.php");
    } else {
        echo "cant add";
    }
}if (isset($_POST['comment'])) {

    var_dump($_POST);
   
   
    $body = mysqli_escape_string($connect, $_POST['body']);
    //$user_id = mysqli_escape_string($connect, $_POST['name']);
    $post_id = mysqli_escape_string($connect, $_POST['PostId']);
    $imagesFile = "public/imags";
    $tmpFile = $_FILES["image"]["tmp_name"];
    $imageName = $_FILES["image"]["name"];
    //echo $tmpFile;
    echo "<br/>";
    //echo $imagesFile . "/" . $imageName;
    echo "<br/>";
   // var_dump($_FILES);

    if (move_uploaded_file($tmpFile, $imagesFile . "/" . basename($imageName))) {
        echo "Done ...";
    } else {
        echo "<pre>";
        //var_dump($_FILES);
        echo "</pre>";
        echo "Error in upload emp pic ....";
        exit;

    }

    
     "insert into comments set body='{$body}',user_id='{$_SESSION['id']}',post_id='{$post_id}',img_url='{$imageName}'";
    $AddPost = mysqli_query($connect, "insert into comments set body='{$body}',user_id='{$_SESSION['id']}',post_id='{$post_id}',img_url='{$imageName}'");
    //var_dump($AddPost);
   // var_dump($connect, "insert into comments set body='$body',user_id='{$_SESSION['id']}',post_id='{$post_id}',img_url='{$imageName}'");

   //var_dump($AddPost);
    if ($AddPost) {
        echo "added";
        header("Location:../views/posts/comments/addComment.php?id=$post_id");
    } else {
        echo "cant add";
    }


}
if (isset($_POST['updateComment'])) {

    var_dump($_POST);
    $body = mysqli_escape_string($connect, $_POST['post']);
    $commentId = mysqli_escape_string($connect, $_POST['commentId']);
    $postId = mysqli_escape_string($connect, $_POST['postId']);
    $imagesFile = "public/imags";
    $tmpFile = $_FILES["image"]["tmp_name"];
    $imageName = $_FILES["image"]["name"];
    //echo $tmpFile;
    echo "<br/>";
    echo $imagesFile . "/" . $imageName;
    echo "<br/>";
   // var_dump($_FILES);

    if (move_uploaded_file($tmpFile, $imagesFile . "/" . basename($imageName))) {
        echo "Done ...";
    } else {
        echo "<pre>";
        //var_dump($_FILES);
        echo "</pre>";
        echo "Error in upload emp pic ....";
        exit;

    }

    echo $result;

    $result = mysqli_query($connect, "update comments set body='$body',img_url='{$imageName}',user_id='{$_SESSION['id']}',post_id='{$postId}' where id='$commentId'");
    echo $result;
    if ($result) {
        echo "updated";
        header("Location:../views/posts/comments/addComment.php?id=$postId");
    } else {
        echo "cant add";
            echo $result;

    }
}