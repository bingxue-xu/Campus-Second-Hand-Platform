<?php
  session_start();

  if(!$_SESSION['user']){
    echo "<script>alert('Please sign in first.');location='login.html'</script>";
  }


	include 'config.php';

  $uid = $_SESSION['user']['id']; 
	$shop_id = $_GET['id'];
  $time = time();

  $sql2="select * from shop where id = '{$shop_id}'";
  $smt2=$pdo->prepare($sql2);
  $smt2->execute();
  $row2=$smt2->fetch();
  if ($row2['uid'] == $uid) {
    echo "<script>alert('This is your own product.');history.go(-1)</script>";die;
  }

  $sql = "INSERT INTO `orders` (`uid`, `shop_id`, `time`) VALUES ('{$uid}', '{$shop_id}', '{$time}')";
  $smt=$pdo->prepare($sql);
	if($smt->execute()){
    $sql = "update shop set status='1' where id='{$shop_id}'";
    $smt = $pdo->prepare($sql);
    if($smt->execute()){
      echo "<script>alert('Buy successful.');location='detail.php?id={$shop_id}'</script>";
    }else{
      echo "<script>alert('Buy failed.');history.go(-1)</script>";die;
    }

  }else{
    echo "<script>alert('Buy failed.');history.go(-1)</script>";die;
  }
		  





?>