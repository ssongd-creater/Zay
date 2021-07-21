<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <title>Zay shop</title>
  <!-- Favicon Link -->
  <link rel="shortcut icon" href="/zay/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/zay/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="/zay/img/favicon.ico">
  <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Reset CSS Link -->
  <link rel="stylesheet" href="/zay/css/reset.css">
  <!-- Light Slider Plugin Link -->
  <link rel="stylesheet" href="/zay/lib/lightslider.css">
  <!-- Main Style CSS Link -->
  <link rel="stylesheet" href="/zay/css/style.css">
  <!-- Media Style CSS Link -->
  <link rel="stylesheet" href="/zay/css/media.css">

</head>
<body>
  

  <div class="wrap">

    <?php
    include $_SERVER["DOCUMENT_ROOT"]."/zay/include/header.php";
    include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
    ?>
    
    <!-- slider Landing Section -->
    <section class="slider">
      <!-- Loop slider box -->
      <div class="slider_box">
        <div class="center slider_wrap">
          <div class="slider_txt">
            <h2>Zay eCommerce</h2>
            <h4>Tiny and Perfect eCommerce Template</h4>
            <p>Zay Shop is an eCommerce HTML5 CSS template with latest version of Bootstrap 5 (beta 1). This template is 100% free provided by TemplateMo website. Image credits go to Freepik Stories, Unsplash and Icons 8.</p>
          </div>
          <div class="slider_img">
            <img src="/zay/img/banner_img_01.jpg" alt="">
          </div>
        </div>
        
      </div>
      <!-- End of Loop slider box -->
      <!-- Loop slider box -->
      <div class="slider_box">
        <div class="center slider_wrap">
          <div class="slider_txt">
            <h2>Proident occaecat</h2>
            <h4>Aliquip ex ea commodo consequat</h4>
            <p>You are permitted to use this Zay CSS template for your commercial websites. You are not permitted to re-distribute the template ZIP file in any kind of template collection websites.</p>
          </div>
          <div class="slider_img">
            <img src="/zay/img/banner_img_02.jpg" alt="">
          </div>
        </div>
      </div>
      <!-- End of Loop slider box -->
      <!-- Loop slider box -->
      <div class="slider_box">
        <div class="center slider_wrap">
          <div class="slider_txt">
            <h2>Repr in voluptate</h2>
            <h4>Ullamco laboris nisi ut</h4>
            <p>TWe bring you 100% free CSS templates for your websites. If you wish to support TemplateMo, please make a small contribution via PayPal or tell your friends about our website. Thank you.</p>
          </div>
          <div class="slider_img">
            <img src="/zay/img/banner_img_03.jpg" alt="">
          </div>
          </div>
      </div>
      <!-- End of Loop slider box -->
    </section>
    <!-- End of slider Landing Section -->
    <!-- Categories Section -->
    <section class="categories">
      <div class="center">
        <div class="tit_box">
          <h2>Categories of The Month</h2>
          <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt<br>mollit anim id est laborum.</p>
        </div>
        <div class="cate_box">
          <?php
            //상품 카테고리 분류 배열 local에 이름
            $cate_arr = array('watches','shoes','accessories');

            for($i = 0; $i < count($cate_arr); $i++){
              $sql = "SELECT * FROM zay_pro WHERE ZAY_pro_cate='{$cate_arr[$i]}' ORDER BY ZAY_pro_idx DESC LIMIT 1";

              $cate_result = mysqli_query($dbConn,$sql);
              $cate_result_row = mysqli_fetch_array($cate_result);
              //cate_result를 배열로 빼오는 것
              $cate_img = $cate_result_row['ZAY_pro_img_01'];
              $cate_tit = $cate_result_row['ZAY_pro_cate'];
              //cate_result_row의 배열 중 이미지와 카테고리 값만 저장
          ?>
          <!-- Loop of Cate Item -->
          <div class="cate_item">
            <div class="cate_img">
              <img src="/zay/data/product_imgs/<?=$cate_img?>" alt="">
            </div>
            <h3><?=$cate_tit?></h3>
            <!-- 변수로 불러온 img와 tit를 넣어줌 -->
            <a href="#" class="main_btn">Go Shop</a>
          </div>
          <!-- End of Loop of Cate Item -->
          <?php
          }
          ?>
        </div>
      </div>
    </section>
    <!-- End of Categories Section -->
    <!-- Featured Product Section -->
    <section class="featured">
      <div class="center">
        <div class="tit_box">
          <h2>Featured Product</h2>
          <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt<br>mollit anim id est laborum.</p>
        </div>
        <div class="featured_box">
          <?php
            $sql1 = "SELECT * FROM zay_pro ORDER BY ZAY_pro_idx DESC";
            $pro_result = mysqli_query($dbConn,$sql1);

            while($pro_row = mysqli_fetch_array($pro_result)){
              $pro_row_idx = $pro_row['ZAY_pro_idx'];
              $pro_row_img = $pro_row['ZAY_pro_img_01'];
              $pro_row_tit = $pro_row['ZAY_pro_name'];
              $pro_row_desc = $pro_row['ZAY_pro_desc'];
              $pro_row_pri = $pro_row['ZAY_pro_pri'];

              //좋아요 싫어요 기능 구현(반복 기능 추가)
              $like_unlike_type = -1;

              $status_query = "SELECT COUNT(*) AS cntStatus, ZAY_like_unlike_type FROM zay_like_unlike WHERE 	ZAY_like_unlike_userid='{$useridx}' AND ZAY_like_unlike_postid='{$pro_row_idx}'";

              $status_result = mysqli_query($dbConn, $status_query);
              $status_row = mysqli_fetch_array($status_result);
              $count_status = $status_row['cntStatus'];

              //-----------------
              if($count_status > 0){
                $like_unlike_type = $status_row['ZAY_like_unlike_type'];
              }

              $like_query = "SELECT COUNT(*) cntLikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=1 AND ZAY_like_unlike_postid='{$pro_row_idx}'";
              $like_result = mysqli_query($dbConn,$like_query);
              $like_row = mysqli_fetch_array($like_result);
              $total_likes = $like_row['cntLikes'];

              //echo $total_likes;

              $unlike_query = "SELECT COUNT(*) cntUnlikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=0 AND ZAY_like_unlike_postid='{$pro_row_idx}'";
              $unlike_result = mysqli_query($dbConn,$unlike_query);
              $unlike_row = mysqli_fetch_array($unlike_result);
              $total_unlikes = $unlike_row['cntUnlikes'];

          ?>
          <!-- Featured Loop Item -->
          <div class="featured_item">
            <div class="item_frame">
              <a href="/zay/pages/details/pro_detail_form.php?pro_idx=<?=$pro_row_idx?>">
                <div class="featured_img">
                  <img src="/zay/data/product_imgs/<?=$pro_row_img?>" alt="">
                </div>
              </a>
              <div class="like_unlike">
                <div class="like_icons">
                  <?php  if(!$userid){ ?>
                  <span onclick="plzLogin()">좋아요 | <b><?=$total_likes?></b></span>
                  <span onclick="plzLogin()">별로에요 | <b><?=$total_unlikes?></b></span>
                  <?php } else { ?>
                  <span id="like_<?=$pro_row_idx?>" class="like" style="<?php if($like_unlike_type == 1){echo "background:#59ab6e;color:#fff;";}?>">좋아요 | 
                    <b id="likes_<?=$pro_row_idx?>"><?=$total_likes?></b>
                  </span>
                  <span id="unlike_<?=$pro_row_idx?>" class="unlike" style="<?php if($like_unlike_type == 0){echo "background:#dd4545; color:#fff;";}?>">별로예요 | 
                    <b id="unlikes_<?=$pro_row_idx?>"><?=$total_unlikes?></b>
                  </span>
                  <?php } ?>
                </div>
                <p><i class="fa fa-krw"></i><?=$pro_row_pri?></p>
              </div>
              <div class="featured_txt">
                <h3><?=$pro_row_tit?></h3>
                <p class="desc"><?=$pro_row_desc?></p>
              </div>
              <?php
              $sql2 = "SELECT * FROM zay_review WHERE ZAY_pro_rev_con_idx=$pro_row_idx";

              $rev_num_sql = mysqli_query($dbConn,$sql2);
              $rev_total=mysqli_num_rows($rev_num_sql);
              ?>
              <div class="reviews">
                <em>Comments (<?=$rev_total?>)</em>
              </div>
            </div>
          </div>
          <!-- End of Featured Loop Item -->
          <?php
          };
          ?>
        </div>
        <div class="load_more">
          <button type="button">더보기</button>
        </div>
      </div>
    </section>
    <?php include $_SERVER['DOCUMENT_ROOT']."/zay/include/footer.php"?>
  </div>

<!-- jQuery Framework Load -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/zay/lib/lightslider.js"></script>
<script src="/zay/js/jq.main.js"></script>
<script src="/zay/js/jq.like.unlike.js"></script>
<script src="/zay/js/slider.js"></script>

<script>
  function plzLogin(){
      alert('로그인 후 이용해 주세요.');
      return false; //로그인 창으로 뜨게 설정해도됨 location.href();
    };
</script>

</body>
</html>