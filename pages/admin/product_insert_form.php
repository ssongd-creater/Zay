<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <title>Zay shop || Admin</title>
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
  <style>
    input,textarea{border:1px solid;}
    textarea{resize:both;}
  </style>
</head>
<body>

<?php include $_SERVER["DOCUMENT_ROOT"]."/zay/include/header.php";?>

<section class="pro_insert">
    <div class="center">
      <form action="/zay/php/product_insert.php" method="post" class="pro_insert_form" name="pro_insert_form" enctype="multipart/form-data">
      <p>
        <select name="pro_select" id="">
          <option value="watches">watches</option>
          <option value="shoes">shoes</option>
          <option value="accessories">accessories</option>
        </select>
      </p>
      <p>상품이름 : <input type="text" name="pro_insert_name"></p>
      <p>상품가격 : <input type="text" name="pro_insert_pri"></p>
      <p>상품브랜드 : <input type="text" name="pro_insert_bran"></p>
      <p>상품설명 : <textarea name="pro_insert_desc"></textarea></p>
      <p>상품색상 : <input type="text" name="pro_insert_color"></p>
      <p>상품사진1 : <input type="file" name="pro_insert_img1"></p>
      <p>상품사진2 : <input type="file" name="pro_insert_img2"></p>
      <button type="submit">상품입력</button>
      </form>
    </div>
  </section>

  <?php include $_SERVER['DOCUMENT_ROOT']."/zay/include/footer.php"?>
  

  <!-- jQuery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>
  

</body>
</html>
