<?php

 $pro_idx = $_GET['pro_idx'];
 $pro_writer = $_GET['pro_writer'];
 $pro_txt = addslashes($_POST['comment_txt']);
 $pro_reg = date("Y-m-d H:i:s");

 //echo $pro_idx, $pro_writer, $pro_txt, $pro_reg;
 include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
 $sql = "INSERT INTO zay_review(ZAY_pro_rev_id, ZAY_pro_rev_con_idx, ZAY_pro_rev_txt, ZAY_pro_rev_reg) VALUES ('{$pro_writer}','{$pro_idx}','{$pro_txt}','{$pro_reg}')";

 mysqli_query($dbConn,$sql);

 header("Location:/zay/pages/details/pro_detail_form.php?pro_idx=$pro_idx");

?>