<?php

  $id_val = $_GET['id_val'];
  //echo $id_val;

  if(!$id_val){//아이디를 입력하지 않았다면 입력 메시지 전달
    echo "아이디를 입력해 주세요.";
  }else{//아이디를 입력했다면 입력 문자가 테이블에 있는지 판별
    include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
    //데이터베이스 접속
    $sql = "SELECT * FROM zay_mem WHERE ZAY_mem_id='{$id_val}'";

    $result = mysqli_query($dbConn,$sql);
    $id_record = mysqli_num_rows($result);

    //echo $id_record; //몇개가 있는지 보여줌

    if($id_record){
      echo $id_val."은(는) 존재하는 아이디 입니다. \n 다른아이디를 사용해주세요.";
    }else{
      echo $id_val."은(는) 사용할 수 있는 아이디 입니다";
    };

  }

?>