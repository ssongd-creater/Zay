<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <title>Zay shop || Cart List</title>
  <!-- Favicon Link -->
  <link rel="shortcut icon" href="/zay/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/zay/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="/zay/img/favicon.ico">
  <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Reset CSS Link -->
  <link rel="stylesheet" href="/zay/css/reset.css">
  <!-- Main Style CSS Link -->
  <link rel="stylesheet" href="/zay/css/style.css">
  <!-- Media Style CSS Link -->
  <link rel="stylesheet" href="/zay/css/media.css">
</head>
<body>

<?php include $_SERVER["DOCUMENT_ROOT"]."/zay/include/header.php";?>

<section class="pro_search">
    <div class="center">
      <div class="tit_box">
        <h2>Cart List</h2>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt<br>mollit anim id est laborum.</p>
      </div>
      <div class="search_lists">
        <?php
        $total = 0;
        if(isset($_SESSION['cart'])){
          foreach($_SESSION['cart'] as $key => $value){//$key는 idx같은 존재 꼭 써줘야함
            $total=$total + $value['cart_pri'];
            $cart_idx = $value['cart_idx'];
            $cart_name = $value['cart_name'];
            $cart_img = $value['cart_img'];
            $cart_desc = $value['cart_desc'];
            $cart_pri = $value['cart_pri'];
            $cart_quan = $value['cart_quan'];
    
        ?>
        <div class="search_item">
          <span class="search_img">
            <a href="zay/pages/details/pro_detail_form.php?pro_idx=<?=$cart_idx?>"><img src="/zay/data/product_imgs/<?=$cart_img?>" alt="">
          </span></a>
          <span class="search_txt">
            <h2><?=$cart_name?></h2>
            <p><?=$cart_desc?></p>
            <h3 class="show_hide"><i class="fa fa-krw"> <?=$cart_pri?></i></h3>
          </span>
          <span class="search_pri">
            <h3><i class="fa fa-krw"></i><?=$cart_pri?></h3>
          </span>
          <span class="search_btns">
            <form action="/zay/php/cart.php" method="post">
              <button name="remove_cart">REMOVE ITEM</button>
              <input type="hidden" name="cart_remove" value="<?=$cart_name?>">
              <button>BUY NOW</button>
            </form>
            
          </span>
        </div>
        <?php } } ?>
      <!-- End of loop search ltem -->
      <div class="total_pri">
        <h3>Total Price : <i class="fa fa-krw"></i> <?=$total?></h3>
      </div>
      </div>
      <!-- End of search lists -->
    </div>
  </section>

  <?php include $_SERVER['DOCUMENT_ROOT']."/zay/include/footer.php";?>
  

  <!-- jQuery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>
  
</body>
</html>
