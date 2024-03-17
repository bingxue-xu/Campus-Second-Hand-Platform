<?php 
  include 'header.php'; 

  if(!$_SESSION['user']){
    echo "<script>alert('Please sign in first.');location='login.html'</script>";die;
  }
  
  if($_SESSION['user']['id'] == $_GET['cell_id']){
		echo "<script>alert('This is your own product.');history.go(-1)</script>";die;
	}

  include 'config.php';

  // Obtain seller information
  $shop_id = $_GET['shop_id'];
	$sql = "select shop.*,user.name from shop join user on shop.uid = user.id where shop.id = {$shop_id}";
	$smt=$pdo->prepare($sql);
	$smt->execute();
	$row=$smt->fetch(); 


  $cell_id = $_GET['cell_id'];

  $uid = $_SESSION['user']['id'];

  $sql2 = "select * from message where shop_id = {$shop_id} and cell_id = {$cell_id} and uid = {$uid}";
	$smt2 = $pdo -> prepare($sql2);
	$smt2 -> execute();
	$row2 = $smt2->fetch();
  if($row2){
    $message_id = $row2['id'];
  } else {
    $sql3 = "INSERT INTO `message` (`shop_id`, `cell_id`, `uid`) VALUES ('{$shop_id}', '{$cell_id}', '{$uid}')";
    $smt3 = $pdo->prepare($sql3);
    $smt3 -> execute();
    $message_id = $pdo->lastInsertId();
  }

  // echo $message_id;die;


?>

  <div class="contaniner">
    
    <div class="contact-left">
      
      <!-- List start -->
      <div class="contact-box">
        
        <div class="sell-user">
          <div>
            <img src="img/headimg.png" alt="">
          </div>
          <div>Seller : <?php echo $row['name']; ?></div>
        </div>

        <div class="contact-content" id="contact-content">
          <?php 
            $sql = "select * from messageList where message_id = {$message_id} order by id asc";
            $smt=$pdo->prepare($sql);
            $smt->execute();
            $msgList=$smt->fetchAll(); 
            foreach($msgList as $k=>$v){
              if($v['cell_id']){
          ?>
            <div class="message-left">
              <div class="message-msg"><?php echo $v['message']?></div>
              <p class="message-date"><?php echo date("m-d H:i",$v['time'])?></p>
            </div>
            <div style="clear: both;"></div>
          
          <?php }else{ ?>

            <div class="message-right">
              <div class="message-msg"><?php echo $v['message']?></div>
              <p class="message-date"><?php echo date("m-d H:i",$v['time'])?></p>
            </div>
            <div style="clear: both;"></div>

          <?php  } }?>

        </div>


      </div><!-- end -->

      
      <form action="message_add.php" method="get" class="contact-input">
        
        <div>

          <input type="hidden" name="message_id" value="<?php echo $message_id; ?>">

          <input type="text" name="message" placeholder="Enter your message here..." required="" />

        </div>

        <div>
          <button>send</button>
        </div>

      </form>

    </div>

    <!-- Information -->
    <div class="contact-right">
      <div class="contact-right-img">
        <img src="<?php echo $row['img'] ?>" alt="">
      </div>
      <div class="contact-right-content">
        <h3><?php  echo $row['cname']; ?></h3>
        <p class="detail-price">$<?php  echo $row['price']; ?></p>
      </div>
    </div>


  </div>

<script>
  var element = document.getElementById("contact-content"); 
  element.scrollTop = element.scrollHeight; 
</script>