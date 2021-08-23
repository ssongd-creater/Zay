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

            <button type="submit">상품입력</button>
          </form>
        </div>
        <div class="mem_admin"></div>
      </div>
    </div>
  </section>


  <?php include $_SERVER['DOCUMENT_ROOT']."/zay/include/footer.php";?>


  <!-- jQuery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>
  <script src="/zay/js/jq.pro_upload.js"></script>


</body>

</html>