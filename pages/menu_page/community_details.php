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
      <?php
        $detail_idx = $_GET['detail_idx'];
        include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
        $sql = "SELECT * FROM zay_comm WHERE ZAY_comm_idx=$detail_idx";

        $detail_result = mysqli_query($dbConn,$sql);
        $detail_row = mysqli_fetch_array($detail_result);

        $detail_tit = $detail_row['ZAY_comm_tit'];
        $detail_con = $detail_row['ZAY_comm_con'];
        $detail_id = $detail_row['ZAY_comm_id'];
        $detail_reg = $detail_row['ZAY_comm_reg'];
        $detail_hit = $detail_row['ZAY_comm_hit'];

        $new_hit = $detail_hit + 1;
        $sql1 = "UPDATE zay_comm SET ZAY_comm_hit=$new_hit WHERE ZAY_comm_idx=$detail_idx";

        mysqli_query($dbConn,$sql1);

        
      ?>
      <div class="tit_box">
        <h2><?=$detail_tit?></h2>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt<br>mollit anim id est laborum.</p>
      </div>
      <div class="write comm_center">
        <h4>Posted By <?=$detail_id?> / <?=$detail_reg?> / <?=$detail_hit?> Hits</h4>
        <form class="write_form" action="/zay/php/community_update.php?detail_idx=<?=$detail_idx?>&detail_writer=<?=$detail_id?>" name="write_form" method="post">
          <div class="write_tit">
            <label for="write_input">제목</label>
            <input type="text" id="write_input" name="write_input" value="<?=$detail_tit?>">
          </div>
          <div class="write_con">
            <textarea name="write_con"><?=$detail_con?></textarea>
          </div>
        </form>
        <div class="write_btn">
          <?php if(!$userid || $userid!=$detail_id){?>
          <a href="/zay/pages/menu_page/community_form.php">돌아가기</a>
          <?php }else{ ?>
          <a href="/zay/pages/menu_page/community_form.php">돌아가기</a>
          <a href="javascript:;" id="update">수정하기</a>
          <a href="/zay/php/community_delete.php?detail_idx=<?=$detail_idx?>&detail_writer=<?=$detail_id?>">삭제하기</a>
          <?php } ?>
        </div>
      </div>
      <!-- End of Write -->
    </div>
  </section>

  <?php include $_SERVER['DOCUMENT_ROOT']."/zay/include/footer.php"?>
  

  <!-- jQuery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>
  <script>
    const upBtn = document.querySelector("#update");
    upBtn.addEventListener("click",function(){
      document.write_form.submit();
    });
  </script>
  <script>
    function plzLogin(){
      alert('로그인 후 이용해 주세요.');
      return false; //로그인 창으로 뜨게 설정해도됨 location.href();
    };

    function sendWrite(){
      if(!document.write_form.write_input.value){
        alert('제목을 입력해 주세요.');
        return;
      }

      if(!document.write_form.write_con.value){
        alert('내용을 입력해 주세요.');
        return;
      }
      document.write_form.submit();
    };
  </script>

</body>
</html>
