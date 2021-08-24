<?php

  $update_idx = $_GET['update_idx'];
  $mem_level = $_GET['mem_level'];

  //echo $update_idx, $mem_level;

  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
  $sql = "UPDATE zay_mem SET ZAY_mem_level=$mem_level WHERE ZAY_mem_idx=$update_idx";

  mysqli_query($dbConn,$sql);

  echo "
    <script>
    alert('수정이 완료되었습니다.');
    location.href='/zay/pages/admin/admin.php';
    </script>
  "

?>