<?php
  session_start();
  if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
  } else {
    $userid = "";
  }

  $reply_idx = $_GET['reply_idx'];
  $reply_id = $_GET['reply_id'];
  $reply_con = addslashes($_POST['reply_con']);

  //echo $userid." ".$reply_idx." ".$reply_id." ".$reply_con;

  if(!$userid || $userid != $reply_id){
    echo"
    <script>
    alert('잘못된 접근입니다');
    location.href='/zay/index.php';
    </script>
    ";
  }else{
    include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
    $sql="UPDATE zay_reply SET ZAY_reply_con = '{$reply_con}' WHERE ZAY_reply_idx=$reply_idx";

    mysqli_query($dbConn, $sql);

    echo"
    <script>
    alert('수정이 완료되었습니다.');
    history.go(-1);
    </script>
    ";
  }

?>