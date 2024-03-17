<?php 
  include 'header.php'; 
  include "config.php";

  $uid = $_SESSION['user']['id'];

  $sql = "select orders.time,shop.*,user.name from orders join shop on orders.shop_id = shop.id join user on shop.uid = user.id where orders.uid = {$uid}";
  $smt = $pdo->prepare($sql);
  $smt->execute();
  $rows = $smt->fetchAll();

?>

  <?php include 'search.php'; ?>

  <div class="message-top-title">
    <h3 class="detail-title detail-title-fa"> Buy list</h3>
  </div>

  <div class="contaniner contaniner18">
    
    <div class="mydd">
      <?php
        foreach($rows as $k => $v){
      ?>
      <div class="mydd-li">
        
        <div class="mydd-li-1">
          <a href="detail.php?id=<?php echo $v['id']?>">
            <img src="<?php echo $v['img']; ?>" alt="">
          </a>
        </div>

        <div class="mydd-li-2">

          <p class="detail-price">$<?php echo $v['price']; ?></p>

          <p class="detail-time">Created <?php echo date('Y-m-d',$v['date'])?></p>

          <p class="detail-address">Warm prompt： <span>Valid from <?php echo $v['date_start']; ?> until <?php echo $v['date_end']; ?></span></p>
          
        </div>

        <div class="mydd-li-3">

          <p>
            <strong>Seller : <?php echo $v['name']; ?></strong>
          </p>
          
          <div><a href="contact.php?shop_id=<?php echo $v['id'];?>&cell_id=<?php echo $v['uid'];?>"><button class="mydd-btn">聊天记录</button></a></div>
        </div>
      </div>
      <?php } ?>
    </div>
    
  </div>

</body>
</html>