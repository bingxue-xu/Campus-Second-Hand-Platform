<?php 
  include 'header.php'; 

  include "config.php";

  $type = $_GET['type'];
  $keyword = $_GET['keyword'];
  
  $where = "";
  if($type){
    $where = $where . " and type ='$type'";
  }
  if($keyword){
    $where = $where .  " and cname like '%$keyword%'";
  }

  $sql = "select * from shop where 1 = 1 {$where}";
  $smt = $pdo->prepare($sql);
  $smt->execute();
  $rows = $smt->fetchAll();
  

?>

  <?php include 'search.php'; ?>

  <div class="containter">
    <div class="left">
      <div class="menu">
        <h5>
          <!-- Category -->
          <img class="menu-img" src="img/l1.png" alt="">
        </h5>

        <ul class="cate_box">
          <li>
            <img src="img/s0.png" class="cate_icon_style">
            <a href="buy.php?type=">All</a>
          </li>
          <li>
            <img src="img/s1.png" class="cate_icon_style">
            <a href="buy.php?type=Books">Books</a>
          </li>
          <li>
            <img src="img/s2.png" class="cate_icon_style">
            <a href="buy.php?type=Furnitures">Furnitures</a>
          </li>
          <li>
            <img src="img/s3.png" class="cate_icon_style">
            <a href="buy.php?type=SL">SL</a>
          </li>
          <li>
            <img src="img/s4.png" class="cate_icon_style">
            <a href="buy.php?type=Electronics">Electronics</a>
          </li>
          <li>
            <img src="img/s5.png" class="cate_icon_style">
            <a href="buy.php?type=Food">Food</a>
          </li>
          <li>
            <img src="img/s6.png" class="cate_icon_style">
            <a href="buy.php?type=Others">Others</a>
          </li>
        </ul>
        
      </div>
    </div>
    <div class="right">
     
      <div class="buy-box">
        <?php
          foreach($rows as $k => $v){
        ?>
          <div class="buy-li">
            
            <a href="detail.php?id=<?php echo $v['id']; ?>">
              
              <div class="buy-img">

                <img src="<?php echo $v['img']; ?>" alt="">

                <!-- Label start -->
                <?php 
                  if($v['status'] == 1){
                ?>
                  <!-- Sold out -->
                  <div class="tips1"><div>Sold out </div></div>
                <?php 
                  }else{
                ?>
                
                <?php
                  $now = time();
                  $date = strtotime($v['date_end']) + 24 * 60 * 60 - 1;

                  if($now > $date){
                ?>
                  <!-- Overtime -->
                  <div class="tips1"><div>Overtime</div></div>
                <?php 
                  }}
                ?>
                <!-- end -->

              </div>

              <p><?php echo $v['cname']; ?></p>
            </a>

          </div>
        <?php } ?>

      </div>
    </div>
  </div>

</body>
</html>