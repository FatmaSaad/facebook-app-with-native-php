<?php

$connect = mysqli_connect("localhost", "root", "", "fb");

?>
<?php
session_start();
if (isset($_SESSION['email'])) {
	echo $_SESSION['email'];
} else {
	echo "NUll";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title> Post Update</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../../../../style/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../style/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../style/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../style/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../style/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../style/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../style/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../style/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../style/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../style/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../style/css/main.css">
	<!--===============================================================================================-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">


	<!-- Bootstrap core CSS -->
	<link href="../../style/vendor2/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="../../style/css2/blog-home.css" rel="stylesheet">
	<style>

	</style>
</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">Start Bootstrap</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Services</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Page Content -->
	<div class="container-login100" style="background-image: url('../../style/images/bg-01.jpg');">

		<div style="justify-content: center " class="container">

			<div style="justify-content: center " class="row">

				<!-- Blog Entries Column -->
				<div style="justify-content: center " class="col-md-8">


					<!-- Blog Post -->
					<?php
					if ($connect) {
						//var_dump($_GET);

						$result = mysqli_query($connect, "select * from posts  where id='{$_GET['postId']}'");
					}
					if ($connect) {
						$comments = mysqli_query($connect, "select * from comments where post_id='{$_GET['postId']}'");
						//var_dump($comments);
						//echo"select * from comments where postId='{$_GET['id']}'";
					}
					$row = mysqli_fetch_assoc($result);

					?>
					<div>
						<div style="justify-content: center ;inline-size: 70% ;" class='card mb-4'>
							<img class="float-left" style=" width: 100%" class='card-img-top' src='../../../controllers/public/imags/<?php echo $row['img_url'] ?>' alt='Card image cap'>
							<div class='card-body'>
								<h2 class='card-title'>Post Title</h2>
								<p class='card-text'><?php echo $row['body'] ?></p>
							</div>
							<div class='card-footer text-muted'>
								<?php

								while ($oneComment = mysqli_fetch_assoc($comments)) {
									//   echo"ooooooooooo";
									// var_dump($oneComment);
									// echo"oooo";
									//echo $oneComment['img_url'] ;
									if ($oneComment['id'] != $_GET['id']) {
										echo "<div>
										<form>
											<div class='form-group'>
													<h4 class='card-title'>	{$oneComment['body']}</h4>
													<img style='width:50%;margin-left: 50%;' class='card-img-top'src='../../../controllers/public/imags/{$oneComment['img_url']}' alt='Card image cap'>
													";
										if ($oneComment['user_id'] == $_SESSION['id']) {
											echo "
														<a href='Delete.php?id={$oneComment['id']}&&postId={$row['id']}'>Delete</a>
														<a href='Edit.php?id={$oneComment['id']}&&postId={$row['id']}'>Edit</a>
														";
										}
										echo "</div>
										</form>
											";
										echo "</div>";
									}
								}
								?>
								<?php
								$commentData = mysqli_query($connect, "select * from comments where id='{$_GET['id']}'");
								//echo $_GET['id'];

								while ($comm = mysqli_fetch_assoc($commentData)) {

									//var_dump($comm);

									echo "<div>

								
									<div style='text_align:center;
									text inline-size: 70% ;' class='card mb-4'>
										<img class='float-left' style=' width: 100%' class='card-img-top' 
										src='../../../controllers/public/imags/{$comm['img_url']}' alt='Card image cap'>

										<form action='../../../Controllers/PostsController.php' method='post' enctype='multipart/form-data' method='post'>

											<div class='card my-4'>
												<div class='card-body'>

													<input type='text' style='color: black' id='form103' value='{$comm['body']}' 
													name='post' class='md-textarea form-control' rows='5'></input>
													<input  name='image' type='file' class='image-upload' accept='image/*'>


												</div>
												<div class='container-login100-form-btn'>
												<input type='hidden' name='commentId' value='{$_GET['id']}'>
												<input type='hidden' name='postId' value='{$row['id']}'>


													<button type='submit' value='updateComment' name='updateComment' class='btn btn-primary btn-block btn-rounded z-depth-1'>
														update &rarr;
													</button>
												</div>
											</div>
										</form>
								</div>
";

									echo "</div>
										</form>
											";
									echo "</div>";
								}								?>

							</div>
						</div>






					</div>



					<div id="dropDownSelect1"></div>

					<!--===============================================================================================-->
					<script src="../../style/vendor/jquery/jquery-3.2.1.min.js"></script>
					<!--===============================================================================================-->
					<script src="../../style/vendor/animsition/js/animsition.min.js"></script>
					<!--===============================================================================================-->
					<script src="../../style/vendor/bootstrap/js/popper.js"></script>
					<script src="../../style/vendor/bootstrap/js/bootstrap.min.js"></script>
					<!--===============================================================================================-->
					<script src="../../style/vendor/select2/select2.min.js"></script>
					<!--===============================================================================================-->
					<script src="../../style/vendor/daterangepicker/moment.min.js"></script>
					<script src="../../style/vendor/daterangepicker/daterangepicker.js"></script>
					<!--===============================================================================================-->
					<script src="../../style/vendor/countdowntime/countdowntime.js"></script>
					<!--===============================================================================================-->
					<script src="../../style/js/main.js"></script>

</body>

</html>