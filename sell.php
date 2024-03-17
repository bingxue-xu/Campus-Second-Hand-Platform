<?php include 'header.php'; ?>

<?php 
  if(!$_SESSION['user']){
    echo "<script>alert('Please sign in first.');location='login.html'</script>";
  }
?>

<?php include 'search.php'; ?>

<div class="detail-contaniner">
  
  <h3 class="detail-title detail-title-fa">Do you have any idle items for sale today?</h3>
  
  <form action="sell_up.php" method="post" class="form-box" enctype="multipart/form-data">
    
    <div class="form-li">
      <div class="form-li-name">Category</div>
      <div class="form-li-input">
        <select name="type" id="">
          <option value="Books">Books</option>
          <option value="Furnitures">Furnitures</option>
          <option value="SL">SL</option>
          <option value="Electronics">Electronics</option>
          <option value="Food">Food</option>
          <option value="Others">Others</option>
        </select>
      </div>
    </div>

    <div class="form-li">
      <div class="form-li-name">Name</div>
      <div class="form-li-input"><input name="cname" type="text" placeholder="Name" required=""></div>
    </div>
    
    <div class="form-li">
      <div class="form-li-name">Price</div>
      <div class="form-li-input"><input name='price' type="text" placeholder="Price" required=""></div>
    </div>

    <div class="form-li">
      <div class="form-li-name">Image</div>
      <div class="form-li-input">
        <input type="file" name="img" id="file0" accept="image/gif,image/jpeg,image/jpg,image/png,image/svg"/><br>  
        <img src="" id="img0"> 
      </div>
    </div>

    <div class="form-li">
      <div class="form-li-name">Valid time</div>
      <div class="form-li-input">
        <input type="date" name="date_start" required=""> 
        &nbsp;&nbsp;
        -
        &nbsp;&nbsp;
        <input type="date" name="date_end" required="">
      </div>
    </div>

    <div class="form-li">
      <div class="form-li-name">Description</div>
      <div class="form-li-input">
        <textarea name="intro" id=""  rows="2"></textarea>
      </div>
    </div>

    <div class="form-li">
      <div class="form-li-name">Location</div>
      <div class="form-li-input">
        <input type="file" name="img2" id="file2" accept="image/gif,image/jpeg,image/jpg,image/png,image/svg"/><br>  
        <img src="" id="img2"> 
      </div>
    </div>
    

    <div class="form-btn">
      <button type="submit">Submit</button>
    </div>

  </form>
  
  </div>
</div>

<script type="text/javascript">
  document.querySelector('#file0').addEventListener('change',function(){  
    var objUrl = getObjectURL(this.files[0]) ;
    console.log("objUrl = "+objUrl);  
      if (objUrl) {
        document.querySelector("#img0").src = objUrl; 
      }   
  })
  document.querySelector('#file2').addEventListener('change',function(){  
    var objUrl = getObjectURL(this.files[0]) ;
    console.log("objUrl = "+objUrl);  
      if (objUrl) {
        document.querySelector("#img2").src = objUrl; 
      }   
  })
  function getObjectURL(file) {  
      var url = null;   
      if(window.createObjectURL!=undefined) {  
          url = window.createObjectURL(file) ;  
      }else if (window.URL!=undefined) {
          url = window.URL.createObjectURL(file) ;  
      }else if (window.webkitURL!=undefined) { 
          url = window.webkitURL.createObjectURL(file) ;  
      }  
      return url ;  
  }  
</script>

</body>
</html>