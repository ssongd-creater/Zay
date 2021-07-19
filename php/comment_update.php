<?php
  //isset 존재여부 확인
    session_start();
    if(isset($_SESSION['userid'])){
      $userid = $_SESSION['userid'];
    } else {
      $userid = "";
    }
    //로그인시 따라다니는 세션

    $pro_idx = $_GET['pro_idx'];
    $pro_writer = $_GET['pro_writer'];
    $pro_update_txt = addslashes($_POST['rev_update_txt']);

    if(!$userid || $userid != $pro_writer){
      echo "
      <script>
      alert('잘못된 접근입니다');
      location.href='/zay/index.php';
      </script>
      ";
    
    }else{
      $pro_idx = $_GET['pro_idx'];
      include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
      $sql = "UPDATE zay_review SET ZAY_pro_rev_txt='{$pro_update_txt}' WHERE ZAY_pro_rev_idx=$pro_idx";

      mysqli_query($dbConn,$sql);

      echo "
      <script>
      alert('수정이 완료되었습니다.');
      history.go(-1);
      </script>
      ";
    }
?>