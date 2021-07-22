<?php

  session_start();
    if(isset($_SESSION['userid'])){
      $userid = $_SESSION['userid'];
    } else {
      $userid = "";
    }

    $write_input = $_POST['write_input'];
    $write_con = addslashes($_POST['write_con']);
    $write_reg = date("Y-m-d");
    $write_hit = 0;

    include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
    $sql = "INSERT INTO zay_comm(ZAY_comm_id,ZAY_comm_tit,ZAY_comm_con,ZAY_comm_reg,ZAY_comm_hit) VALUES ('{$userid}','{$write_input}','{$write_con}','{$write_reg}','{$write_hit}')";

    mysqli_query($dbConn,$sql);

    echo"
    <script>
      alert('게시글 입력이 완료되었습니다.');
      location.href='/zay/pages/menu_page/community_form.php';
    </script>
    ";
?>

