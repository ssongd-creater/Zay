<?php
  $pro_like = 0;
  $pro_cate = $_POST['pro_select'];
  $pro_name = addslashes($_POST['pro_insert_name']); //addslashes 특수문자가 들어갈 때 오류를 잡아준다.
  $pro_pri = $_POST['pro_insert_pri'];
  $pro_bran = $_POST['pro_insert_bran'];
  $pro_desc = addslashes($_POST['pro_insert_desc']);
  $pro_color = $_POST['pro_insert_color'];
  $pro_reg = date("Y-m-d");

  $pro_img1_name = $_FILES['pro_insert_img1']['name'];
  $pro_img1_tmp = $_FILES['pro_insert_img1']['tmp_name'];
  $pro_img1_err = $_FILES['pro_insert_img1']['error'];


  $pro_img2_name = $_FILES['pro_insert_img2']['name'];
  $pro_img2_tmp = $_FILES['pro_insert_img2']['tmp_name'];
  $pro_img2_err = $_FILES['pro_insert_img2']['error'];

  //상품 이미지 업로드 파일
  $pro_upload_dir = $_SERVER['DOCUMENT_ROOT']."/zay/data/product_imgs/";

  //사진 업로드 1
  if($pro_img1_name && !$pro_img1_err){
    $uploaded_url = $pro_upload_dir.$pro_img1_name;
    if(!move_uploaded_file($pro_img1_tmp, $uploaded_url)){
      die("파일을 지정한 디렉토리에 업로드를 실패했습니다.");
    }
  }else{
    $pro_img1_name = "";
  }

  //사진 업로드 2
  if($pro_img2_name && !$pro_img2_err){
    $uploaded_url = $pro_upload_dir.$pro_img2_name;
    if(!move_uploaded_file($pro_img2_tmp, $uploaded_url)){
      die("파일을 지정한 디렉토리에 업로드를 실패했습니다.");
    }
  }else{
    $pro_img2_name = "";
  }

  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
  $sql = "INSERT INTO zay_pro (
    ZAY_pro_like,ZAY_pro_cate,ZAY_pro_name,ZAY_pro_pri,ZAY_pro_bran,ZAY_pro_desc,ZAY_pro_color,ZAY_pro_img_01,ZAY_pro_img_02,ZAY_pro_reg
    ) VALUES (
      '{$pro_like}','{$pro_cate}','{$pro_name}','{$pro_pri}','{$pro_bran}','{$pro_desc}','{$pro_color}','{$pro_img1_name}','{$pro_img2_name}','{$pro_reg}'
    )";

    mysqli_query($dbConn,$sql);

    echo"
      <script>
        alert('상품 입력이 완료되었습니다.');
        location.href='/zay/pages/admin/product_insert_form.php';
      </script>
    ";
?>