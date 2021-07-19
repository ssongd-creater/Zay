<?php
  //isset 존재여부 확인
    session_start();
    if(isset($_SESSION['userid'])){
      $userid = $_SESSION['userid'];
    } else {
      $userid = "";
    }
    //로그인시 따라다니는 세션

    $pro_writer = $_GET['pro_writer'];


    if(!$userid || $userid != $pro_writer){
      echo "
      <script>
      alert('잘못된 접근입니다');
      location.href='/zay/index.php';
      </script>
      ";
    
    }else{
      $del_key = $_GET['del_key'];
      include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
      $sql = "DELETE FROM zay_review WHERE ZAY_pro_rev_idx=$del_key";

      mysqli_query($dbConn,$sql);

      echo "
      <script>
      alert('삭제가 완료되었습니다.');
      history.go(-1);
      </script>
      ";
    }
?>