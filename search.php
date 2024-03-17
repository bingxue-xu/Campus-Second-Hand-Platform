<div class="search_box">

  <div class="search_box_left">
    <img src="img/logo.png">
  </div>


  <div class="search_box_middle">

    <form action="buy.php" method="get">

      <input type="hidden" name="type" value="<?php echo $_GET['type']; ?>">

      <input type="text" name="keyword" value="" placeholder="What are you looking for?">

      <input type="text" name="location" placeholder="Location">

      <!-- submit -->
      <input type="submit" value="search">

    </form>
  
  </div>
  <div class="search_box_right">
    <?php 
      if($_SESSION['user']){
    ?>
      <a href="javascript:;">Welcome,<?php echo $_SESSION['user']['name']; ?>!</a>
      <a href="buy_list.php">Buy list</a>
      <a href="sell_list.php">Sell list</a>
      <a href="my_message.php">Message</a>
      <a href="logout.php">Sign out</a>

    <?php }else{ ?>
      <a href="reg.html">Sign up</a>
      <a href="login.html">Sign in</a>
    <?php } ?>
  </div>
</div>