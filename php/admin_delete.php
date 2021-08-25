<?php

  // echo $_POST['item'][0];
  // echo $_POST['item'][1];

  if(!isset($_POST['item'])){
    echo"
    <script>
      alert('삭제할 게시글을 선택해 주세요');
      history.go(-1);
    </script>
    ";
  }else{
    include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
    for($i=0;$i<count($_POST['item']);$i++){
      $check_item = $_POST['item'][$i];
      //echo $check_item;
      $sql="DELETE FROM zay_mem WHERE ZAY_mem_idx=$check_item";
      mysqli_query($dbConn,$sql);
    }
  };

  echo"
  <script>
    alert('삭제가 완료되었습니다.')
    location.href='/zay/pages/admin/admin.php';
  </script>
  "

?>