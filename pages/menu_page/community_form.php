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

<section class="community">
    <div class="center">
      <div class="tit_box">
        <h2>Featured Product</h2>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt<br>mollit anim id est laborum.</p>
      </div>
      <div class="comm_table">
        <ul class="comm_row">
          <li class="comm_tit">
            <span>번호</span>
            <span>아이디</span>
            <span>제목</span>
            <span>등록일</span>
            <span>조회수</span>
          </li>
          <li class="comm_con">
            <span>1</span>
            <span>sksk1440</span>
            <span>사이트 오픈을 축하합니다.</span>
            <span>2021-07-21</span>
            <span>24</span>
          </li>
          <li class="comm_con">
            <span>2</span>
            <span>test2</span>
            <span>테스트를 하고있어요</span>
            <span>2021-07-21</span>
            <span>65</span>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <?php include $_SERVER['DOCUMENT_ROOT']."/zay/include/footer.php"?>
  

  <!-- jQuery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>

</body>
</html>
