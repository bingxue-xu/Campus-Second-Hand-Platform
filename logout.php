<?php 
	session_start();

	unset($_SESSION['user']);
	echo "<script>alert('Successfully signed out.');location='index.php'</script>";
?>