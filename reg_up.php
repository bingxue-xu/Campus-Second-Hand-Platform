<?php
	include 'config.php';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];

	if($password != $repassword){
		echo "<script>alert('The passwords entered twice are inconsistent.');history.go(-1)</script>";die;
	}

	$sql = "select * from user where email = '{$email}' ";
	$smt=$pdo->prepare($sql);
	$smt->execute();
	$row=$smt->fetch(); 
	if ($row) {
    	echo "<script>alert('Email already exists.');history.go(-1)</script>";die;
    }

	$sql = "INSERT INTO `user` ( `name`, `password`, `email`) VALUES ('{$name}','{$password}','{$email}')";
	$smt=$pdo->prepare($sql);
	if($smt->execute()){
		echo "<script>alert('Sign up successful.');location='login.html'</script>";
	}else{
		echo "<script>alert('Sign up failed.');history.go(-1)</script>";die;
	}

?>