<?php
session_start();

include "config.php";

$email = $_POST['email'];
$password = $_POST['password'];

if (!$email) {
  echo "<script>alert('Please enter email.');history.go(-1)</script>";
  die;
}

if (!$password) {
  echo "<script>alert('Please enter password.');history.go(-1)</script>";
  die;
}

$sql = "select * from user where email = '{$email}' and password = '{$password}'";
$smt = $pdo->prepare($sql);
$smt->execute();
$rows = $smt->fetch();
if (!$rows) {

  echo "<script>alert('Email or password error.')</script>";
  echo "<script>history.go(-1)</script>";
  die;
}

$_SESSION['user'] = $rows;
echo "<script>alert('Sign in successful.')</script>";
echo "<script>location='index.php'</script>";
