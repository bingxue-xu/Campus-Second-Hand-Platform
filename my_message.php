<?php 
  include 'header.php'; 
  include "config.php";

  $uid = $_SESSION['user']['id'];

  $sql = "select message.last_time,message.uid as auid,message.id as aid,shop.*,user.name from message join shop on message.shop_id = shop.id join user on message.uid = user.id where message.cell_id = {$uid}";
  $smt = $pdo->prepare($sql);
  $smt->execute();
  $rows = $smt->fetchAll();

?>

  <?php include 'search.php'; ?>

  <div class="message-top-title">
    <h3 class="detail-title detail-title-fa"> Message list</h3>
  </div>

  <div class="contaniner contaniner18">

    <div class="mydd">
      <?php
        foreach($rows as $k => $v){
      ?>
      <div class="mydd-li">
        <div class="mydd-li-1"><a href="detail.php?id=<?php echo $v['id']?>"><img src="<?php echo $v['img']; ?>" alt=""></a></div>
        <div class="mydd-li-2">

          <p class="detail-price">$<?php echo $v['price']; ?></p>

          <p class="detail-time">Created <?php echo date('Y-m-d',$v['date'])?></p>

          <p class="detail-address">Warm prompt： <span>Valid from <?php echo $v['date_start']; ?> until <?php echo $v['date_end']; ?></span></p>
          
        </div>
        <div class="mydd-li-3">
          <p>
            <strong>Buyer : <?php echo $v['name']; ?></strong>
            <br/>
            Sent an inquiry 
            <br>
            at <?php echo date("H:i",$v['last_time']) ; ?>16:29 on <?php echo date("m-d",$v['last_time']) ; ?>
          </p>
          <div><a href="contact2.php?message_id=<?php echo $v['aid'];?>&shop_id=<?php echo $v['id'];?>"><button class="mydd-btn">reply</button></a></div>
        </div>
      </div>
      <?php } ?>
    </div>
    
  </div>

</body>
</html>