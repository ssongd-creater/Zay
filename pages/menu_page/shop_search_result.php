<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <title>Zay shop || Products</title>
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
        <h2>Search Result</h2>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt<br>mollit anim id est laborum.</p>
      </div>
      <div class="search_lists">
        <?php
        $pro_search = $_GET['pro_search'];

        include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
        $sql = "SELECT * FROM zay_pro WHERE ZAY_pro_name LIKE '%$pro_search%' ORDER BY ZAY_pro_idx DESC";
        //'%$pro_search%' 에 { } 가 있으면 온전한 값만 도출된다. 우리는 일부만 검색해야하니 사용하지 않았다. Like로 유사문자열 검색시 변수를 {}로 감싸지 않았다.

        $result = mysqli_query($dbConn, $sql);
        $result_num = mysqli_num_rows($result);
        //echo $result_num;
        if(!$result_num){
          echo '<div class="search_item" style="padding:10px 20px;justify-content:center">
           검색 결과가 없습니다.
          </div>';
        } else {
          while($result_row = mysqli_fetch_array($result)){
            $result_idx = $result_row['ZAY_pro_idx'];
            $result_img = $result_row['ZAY_pro_img_01'];
            $result_name = $result_row['ZAY_pro_name'];
            $result_desc = $result_row['ZAY_pro_desc'];
            $result_pri = $result_row['ZAY_pro_pri'];
        ?>
        <div class="search_item">
          <span class="search_img">
            <a href="/zay/pages/details/pro_detail_form.php?pro_idx=<?=$result_idx?>"><img src="/zay/data/product_imgs/<?=$result_img?>" alt="">
          </span></a>
          <span class="search_txt">
            <h2><?=$result_name?></h2>
            <p><?=$result_desc?></p>
          </span>
          <span class="search_pri">
            <h3><i class="fa fa-krw"></i><?=$result_pri?></h3>
          </span>
          <span class="search_btns">
            <button>BUY NOW</button>
            <button>ADD TO CART</button>
          </span>
        </div>
      <!-- End of loop search ltem -->
      <?php } } ?>
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
