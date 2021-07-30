<?php

  // $a = $_POST['cart_img'];
  // $b = $_POST['cart_name'];
  // $c = $_POST['cart_desc'];
  // $d = $_POST['cart_pri'];

  // echo $a." ".$b." ".$c." ".$d;

  session_start();
  //session_destroy();//세션이 있어도 보여줄 수 있음
  //서버의 요청방식이 post인지 get인지 판별해서
  if($_SERVER["REQUEST_METHOD"]=="POST"){//포스트 방식으로 데이터가 넘어올 경우
    if(isset($_POST['add_to_cart'])){//add_to_cart의 name을 가진 버튼을 눌러 넘어올 경우 판별하는 이유는 session이 넘어올건데 중복체크시 확인을 위해서
      if(isset($_SESSION['cart'])){
        $addedItem = array_column($_SESSION['cart'],'cart_name');
        //array_column : 주어진 배열(array)(첫번째 파라미터)에서 특정 컬럼(두번째 파라미터)값을 반환 => https://zetawiki.com/wiki/PHP_array_column()

        if(in_array($_POST['cart_name'], $addedItem)){
          //in_array(a,b) : b배열에서 a요소가 있으면 true
          echo "
            <script>
              alert('이미 추가된 상품입니다.');
              history.go(-1);
            </script>
          ";
        }else{
          $count = count($_SESSION['cart']);
          //echo $count;
          $_SESSION['cart'][$count]=array('cart_idx' => $_POST['cart_idx'],'cart_img' => $_POST['cart_img'],'cart_name' => $_POST['cart_name'],'cart_desc' => $_POST['cart_desc'],'cart_pri' => $_POST['cart_pri'],'cart_quan' => 1);

          echo"
            <script>
              alert('카트에 상품이 추가되었습니다.');
              history.go(-1);
            </script>
          ";
         //var_dump($_SESSION['cart']);
        };

      } else {
        $_SESSION['cart'][0]=array('cart_idx' => $_POST['cart_idx'],'cart_img' => $_POST['cart_img'],'cart_name' => $_POST['cart_name'],'cart_desc' => $_POST['cart_desc'],'cart_pri' => $_POST['cart_pri'],'cart_quan' => 1);

        echo "
          <script>
            alert('카트에 상품이 추가되었습니다.');
            history.go(-1);
          </script>
        ";
      };
      //var_dump($_SESSION['cart']);
        //var_dump($addedItem);

    } //end check post add_to_cart name

    // start check remove_cart post data
    if(isset($_POST['remove_cart'])){
      foreach($_SESSION['cart'] as $key => $value){
        if($value['cart_name'] == $_POST['cart_remove']){//추가된 카트 상품 정보 중 상품 이름이 cart_romove 버튼 클릭 시 넘어오는 cart_remove의(값이) post value와 같은지
          unset($_SESSION['cart'][$key]);
          $_SESSION['cart'] = array_values($_SESSION['cart']);

          echo"
          <script>
            alert('카트에서 상품이 삭제되었습니다.');
            history.go(-1);
          </script>
          ";
        }
      }
    }

  }
?>