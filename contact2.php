<?php 
  include 'header.php'; 

  include 'config.php';

  $shop_id = $_GET['shop_id'];
	$sql = "select shop.*,user.name from shop join user on shop.uid = user.id where shop.id = {$shop_id}";
	$smt=$pdo->prepare($sql);
	$smt->execute();
	$row=$smt->fetch(); 

  $cell_id = $_SESSION['user']['id'];
  $message_id = $_GET['message_id'];

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
            <div class="message-right">
              <div class="message-msg"><?php echo $v['message']?></div>
              <p class="message-date"><?php echo date("m-d H:i",$v['time'])?></p>
            </div>
            <div style="clear: both;"></div>

          <?php }else{ ?>

            <div class="message-left">
              <div class="message-msg"><?php echo $v['message']?></div>
              <p class="message-date"><?php echo date("m-d H:i",$v['time'])?></p>
            </div>
            <div style="clear: both;"></div>

          <?php  } }?>

        </div>


      </div><!-- end -->


      <form action="message_add2.php" method="get" class="contact-input">
        
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