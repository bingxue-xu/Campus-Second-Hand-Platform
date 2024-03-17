<?php 
  include 'header.php'; 

  include 'config.php';

  $id = $_GET['id'];
	$sql = "select shop.*,user.name from shop join user on shop.uid = user.id where shop.id = {$id}";
	$smt=$pdo->prepare($sql);
	$smt->execute();
	$row=$smt->fetch();


?>

  <?php include 'search.php'; ?>

  <div class="detail-contaniner">

    <h3 class="detail-title">
      <?php echo $row['cname']; ?>
    </h3>


    <div class="detail-main">
      <div class="detail-img">
        
        
        <div>
          <!-- img -->
          <img src="<?php echo $row['img']; ?>" alt="">


          <!-- Label start -->
          <?php
            if($row['status'] == 1){
          ?>
            <!-- Sold out  -->
            <div class="tips"><div>Sold out </div></div>
          <?php 
            }else{
          ?>
          <?php
            $now = time();
            $date = strtotime($row['date_end']) + 24 * 60 * 60 - 1;

            if($now > $date){
          ?>
            <!-- Overtime -->
            <div class="tips"><div>Overtime</div></div>
          <?php 
            }}
          ?>
          <!-- end -->

        </div>
        
        <br>

        <!-- Description -->
        <div class="detail-desc">
          Description :
          <p>
            <?php echo $row['intro']; ?> 
          </p>
        </div>
      </div>
      <div class="detail-content">

        <!-- price -->
        <p class="detail-price">$<?php echo $row['price']; ?></p>

        <!-- Created time -->
        <p class="detail-time">Created <?php echo date('Y-m-d',$row['date'])?></p>

        <!-- Valid from xx until xx -->
        <p class="detail-address">
          Warm prompt： <span>Valid from <?php echo $row['date_start']; ?> until <?php echo $row['date_end']; ?></span>
        </p>

        <br>

        <!-- Name -->
        <div class="detail-info">
          <div>
            <img src="img/headimg.png">
          </div>
          <p><?php echo $row['name']; ?></p>
        </div>

        <p class="detail-operation">
          <?php 
            $now = time();
            $date = strtotime($row['date_end']) + 24 * 60 * 60 - 1;

            if($row['status'] == 0 && $now < $date){
          ?>
            <a href="buy_up.php?id=<?php echo $row['id']; ?>"><button class="buynow">Buy</button></a> 
            <a href="contact.php?shop_id=<?php echo $row['id'];?>&cell_id=<?php echo $row['uid'];?>"><button class="call">Contact</button></a>

          <?php }else{ ?>
            <a href="javascript:;"><button class="buynow aaa">Buy</button></a> 
            <a href="javascript:;"><button disabled class="call aaa">Contact</button></a>
            
          <?php } ?>
        </p>

        <br><br><hr><br>

        <!-- Map -->
        <div class="detail-map">
          <img src="<?php echo $row['img2']; ?>">
        </div>

        

    
        
      </div>
    </div>
  </div>


</body>
</html>