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

  <section class="comments">
    <div class="center">
      <div class="comments_tit">
        <?php
          $sql2 = "SELECT * FROM zay_reply WHERE ZAY_comm_reply_idx=$detail_idx";
          $reply_result = mysqli_query($dbConn, $sql2);
          $reply_total = mysqli_num_rows($reply_result);
        ?>
        <span>답글</span> |
        <span><em><?=$reply_total?></em> Replies</span>
      </div>

      <div class="comment_insert">
        <form action="/zay/php/reply_insert.php?detail_idx=<?=$detail_idx?>" method="post" name="reply_form">
          <textarea type="text" placeholder="답글을 입력해 주세요." name="reply_txt"></textarea>
          <?php if(!$userid){ ?>
          <button type="button" onclick="plzLogin()">입력</button>
          <?php } else { ?>
          <button type="button" onclick="insertTxt()">입력</button>
          <?php } ?>
        </form>
      </div>
      <!-- End of comment_insert -->
      <div class="comment_contents">
        <!-- Loop Comment -->
        <div class="loop_contents">
          <div class="comments_tit">
            <span>test2</span> |
            <span>2021-07-26</span>
          </div>
          <form action="#" method="post">
            <div class="comments_text">
              <em class="rev_txt">첫 댓글입니다.</em>
              <textarea class="rev_update_txt" name="rev_update_txt">첫 댓글입니다.</textarea>
              <!-- 수정/삭제를 하기 위해 form태그 안에 넣어준다 -->
            
              <span class="comments_btns">
                <button type="submit" class="rev_send">보내기</button>
                <button type="button" class="rev_update">수정</button>
                <button type="button" class="rev_delete" value="">삭제</button>
                <input type="hidden" value="">
                <!-- form태그안에 submit은 하나밖에 못씀 삭제는 a태그로 사용하는게 좋음 -->
              </span>
            </div>
          </form>
        </div>
        <!-- End of Loop Comment -->
      </div>
    </div>
  </section>

  <?php include $_SERVER['DOCUMENT_ROOT']."/zay/include/footer.php"?>
  

  <!-- jQuery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>
  <!-- <script>
    const upBtn = document.querySelector("#update");
    upBtn.addEventListener("click",function(){
      document.write_form.submit();
    });
  </script> -->
  <script>
    function plzLogin(){
      alert('로그인 후 이용해 주세요.');
      return false; //로그인 창으로 뜨게 설정해도됨 location.href();
    };

    function insertTxt(){
      if(!document.reply_form.reply_txt.value){
        alert('답글을 입력해 주세요.');
        return;
      }
      document.reply_form.submit();
    }
  </script>

</body>
</html>
