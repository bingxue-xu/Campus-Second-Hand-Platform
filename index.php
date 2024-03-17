  <?php include 'header.php'; ?>

  <?php include 'search.php'; ?>

  <div class="top_image">
    <img src="img/top02.jpg">
  </div>


  <div class="containter">
    <div class="left">
      <div class="menu">
        <h5>
          <!-- Category -->
          <img class="menu-img" src="img/l1.png" alt=""></h5>
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
      <div class="main">
        <div style="background-color:#FFF8D1;">
          <a href="buy.php">
            <img src="img/m1.png" alt="">
            &nbsp;&nbsp;
            <span>Buy</span>
          </a>
        </div>
        <div style="background-color:#FEDCDC;">
          <a href="sell.php">
            <span>Sell</span>
            &nbsp;&nbsp;
            <img src="img/m2.png" alt="">
          </a>
        </div>
      </div>
      <div class="box">
        <?php 
          include "config.php";

          $sql = "select * from shop order by id desc";
          $smt=$pdo->prepare($sql);
          $smt->execute();
          $rows=$smt->fetchAll(); 

          foreach ($rows as $k => $v){
        ?>
          <div class="box-li">
            <img src="<?php echo $v['img']?>" draggable="false" alt="">
            <div class="buy">
              <a href="detail.php?id=<?php echo $v['id']; ?>">Detail</a>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>
  </div>

  <script>
    const box = document.querySelector('.box');


    box.onmousedown = function(e) {

      let startX = e.clientX;
      let originalScrollX = box.scrollLeft;
      document.onmousemove = function(e) {
        let subs = e.clientX - startX;
        box.scrollLeft = originalScrollX - subs;
      }


      document.onmouseup = function() {
        document.onmousemove = document.onmouseup = null;
      }
    }
  </script>


</body>

</html>