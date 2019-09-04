<?php
	session_start();
	require_once '../core/init.php';
	include('includes/header.php');
?>

<?php 
	if(!isset($_SESSION['email'])){
      echo "<script>window.open('login.php','_self')</script>";
    }else{
?>

	<main>
		<h1 class="text-center"> This is index page of employer </h1>
	</main>

<?php
	include 'includes/footer.php';
?>

<?php } ?>