<?php
  session_start();

	include 'config.php';

  
	$file = $_FILES['img'];
  if(!$file['name']){
    echo "<script>alert('Please select an image.');history.go(-1)</script>";die;
  }

  $file2 = $_FILES['img2'];
  if(!$file2['name']){
    echo "<script>alert('Please select an location image.');history.go(-1)</script>";die;
  }
 

  $arr = array('jpeg','png','jpg');

  // Image
  $filetype = explode('.', $file['name']);
  if(!in_array($filetype[1], $arr)){
    echo "<script>alert('Please select the correct format of the image.');history.go(-1)'</script>";die;
  }
  
  $filename = md5(time()).rand(100,999).'.'.$filetype[1];
  $path = 'upload/'.$filename;
  $bool = move_uploaded_file($file['tmp_name'], $path);
  if(!$bool){
    echo "<script>alert('Image upload failed.');history.go(-1)'</script>";die;
  }
  $img = $path;
  
  // Location
  $filetype = explode('.', $file2['name']);
  if(!in_array($filetype[1], $arr)){
    echo "<script>alert('Please select the correct format for the location image.');history.go(-1)'</script>";die;
  }

  $filename = md5(time()).rand(100,999).'.'.$filetype[1];
  $path = 'upload/'.$filename;
  $bool = move_uploaded_file($file2['tmp_name'], $path);
  if(!$bool){
    echo "<script>alert('Location image upload failed.');history.go(-1)'</script>";die;
  }
  $img2 = $path;

  // go on...
  $type = $_POST['type'];
	$cname = $_POST['cname'];
	$price = $_POST['price'];
	$date_start = $_POST['date_start'];
	$date_end = $_POST['date_end'];
	$intro = $_POST['intro'];
	$date = time();
  $uid = $_SESSION['user']['id'];


  $sql = "INSERT INTO `shop` (`type`, `cname`, `price`, `date_start`, `date_end`, `intro`, `date`, `uid`, `img`, `img2`) VALUES ('{$type}','{$cname}','{$price}','{$date_start}','{$date_end}','{$intro}','{$date}','{$uid}','{$img}','{$img2}')";
  
  $smt=$pdo->prepare($sql);
  if($smt->execute()){
    echo "<script>alert('Successfully published.');location='sell.php'</script>";
  }else{
    echo "<script>alert('Publishing failed.');history.go(-1)</script>";die;
  }


?>