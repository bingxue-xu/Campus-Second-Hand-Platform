<?php
  session_start();

	include 'config.php';

	$message_id = $_GET['message_id'];
	$message = $_GET['message'];
	$time = time();
  $cell_id = $_SESSION['user']['id'];

  $sql = "INSERT INTO `messageList` (`message_id`, `message`, `time`, `cell_id`) VALUES ('{$message_id}', '{$message}', '{$time}', '{$cell_id}')";
  $smt=$pdo->prepare($sql);
	if($smt->execute()){
    $sql="update message set last_time='{$time}' where id='{$message_id}'";
    $smt=$pdo->prepare($sql);
    $smt->execute();

    $sql = "select * from message where id = {$message_id}";
    $smt=$pdo->prepare($sql);
    $smt->execute();
    $row=$smt->fetch(); 

    echo "<script>location='contact2.php?shop_id={$row["shop_id"]}&message_id={$message_id}'</script>";
  }else{
    echo "<script>history.go(-1)</script>";die;
  }
		  





?>