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

  };

?>