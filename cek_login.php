<?php 
session_start();
 
include 'connect.php';
 
$username = $_POST['username']; //dgdsrfg
$password = $_POST['password']; //dfgdfsg
 
$data = mysqli_query($con,"SELECT * FROM tb_guru WHERE username='$username' and password='$password'");
 
$cek = mysqli_num_rows($data); // 2

 if ($cek > 0) {
 	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
 	header("location:dashboard.php");
 } else {
 	
 	header("location:login.php");
 }
 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             