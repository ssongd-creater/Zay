<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <title>Zay shop || Community</title>
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

  <section class="admin">
    <div class="center">
      <div class="tit_box">
        <h2>관리자 페이지</h2>
      </div>

      <div class="admin_tabs">
        <button type="button">상품 관리</button>
        <button type="button">회원 관리</button>
      </div>

      <div class="admin_panels">
        <div class="pro_admin">
          <form action="/zay/php/product_insert.php" method="post" class="pro_insert_form" name="pro_insert_form"
            enctype="multipart/form-data">
            <p class="category">
              <em>Category</em>
              <select name="pro_select" id="">
                <option value="watches">watches</option>
                <option value="shoes">shoes</option>
                <option value="accessories">accessories</option>
              </select>
            </p>

            <div class="short_txt">
              <p><label>상품이름</label><input type="text" name="pro_insert_name" placeholder="상품이름"></p>
              <p><label>상품가격</label><input type="text" name="pro_insert_pri" placeholder="상품가격"></p>
              <p><label>상품브랜드</label><input type="text" name="pro_insert_bran" placeholder="브랜드 이름"></p>
              <p><label>상품색상</label><input type="text" name="pro_insert_color" placeholder="ex) red / green / blue"></p>
            </div>

            <p class="desc_input"><textarea name="pro_insert_desc" placeholder="상품에 대한 설명을 입력해 주세요."></textarea></p>

            <div class="img_input">
              <div class="upload_box img1">
                <div class="input_controll">
                  <input type="text" class="upload_name" placeholder="상품사진1">
                  <label for="pro_img_1" class="input_img_tit">사진 선택</label>
                  <input type="file" name="pro_insert_img1" class="upload_hidden" id="pro_img_1">
                </div>
                <div class="img1_box img_wrap">
                  <img id="img1">
                </div>
              </div>

              <div class="upload_box img2">
                <div class="input_controll">
                  <input type="text" class="upload_name" placeholder="상품사진1">
                  <label for="pro_img_2" class="input_img_tit">사진 선택</label>
                  <input type="file" name="pro_insert_img2" class="upload_hidden" id="pro_img_2">
                </div>
                <div class="img1_box img_wrap">
                  <img id="img2">
                </div>
              </div>
            </div>

            <button type="submit" class="pro_insert_btn">상품입력</button>
          </form>
        </div>
        <div class="mem_admin">
          <ul class="mem_admin_lists">

            <li class="mem_admin_tit">
              <span>선택</span>
              <span>번호</span>
              <span>아이디</span>
              <span>이름</span>
              <span>레벨</span>
              <span>수정</span>
            </li>

            <form action="#" class="mem_admin_form" method="post" id="mem_admin_form">
              <?php
              include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
              $sql = "SELECT * FROM zay_mem ORDER BY ZAY_mem_idx LIMIT 5";

              $mem_result = mysqli_query($dbConn,$sql);
              while($mem_row = mysqli_fetch_array($mem_result)){
                $mem_idx = $mem_row['ZAY_mem_idx'];
                $mem_id = $mem_row['ZAY_mem_id'];
                $mem_name = $mem_row['ZAY_mem_name'];
                $mem_level = $mem_row['ZAY_mem_level'];
            ?>

              <li class="mem_admin_con">
                <span><input type="checkbox" name="item[]" value="<?=$mem_idx?>"></span>
                <span class="idx"><?=$mem_idx?></span>
                <span><?=$mem_id?></span>
                <span><?=$mem_name?></span>
                <span class="level"><input type="text" value="<?=$mem_level?>" name="mem_level"></span>
                <span><button type="button" class="update_btn">수정</button></span>
              </li>
              <?php } ?>
            </form>
          </ul>
          <div class="select_del_btn">
            <button type="button">선택삭제</button>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php include $_SERVER['DOCUMENT_ROOT']."/zay/include/footer.php";?>


  <!-- jQuery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>
  <script src="/zay/js/jq.pro_upload.js"></script>
  <script>
  $(function() {
    $(".update_btn").click(function() {
      const mem_idx = $(this).parent().siblings('.idx').text();
      const mem_level = $(this).parent().siblings('.level').find('input').val();
      //alert(mem_level);


      // location.href = `/zay/php/member_update.php?update_idx=${mem_idx}&mem_level=${mem_level}`;
    });


    $(".select_del_btn button").click(function() {
      $("#mem_admin_form").attr('action',
        `/zay/php/admin_delete.php`).submit();
    });
  });
  </script>

</body>

</html>