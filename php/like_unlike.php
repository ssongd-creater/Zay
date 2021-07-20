<?php

  session_start();
  if(isset($_SESSION['useridx'])){
    $useridx = $_SESSION['useridx'];
  } else {
    $useridx = "";
  }

  $post_id = $_POST['postId'];
  $type = $_POST['type'];

  // echo $useridx.'<br>';
  // echo $post_id.'<br>';
  // echo $type.'<br>';
  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
  //기존에 있던 좋아요, 싫어요 수를 읽어서 초기화
  $sql = "SELECT COUNT(*) AS cntpost FROM zay_like_unlike WHERE ZAY_like_unlike_postid='{$post_id}' AND ZAY_like_unlike_userid='{$useridx}'";
  //기존에 내가 like를 했다가 unlike를 했으면 like를 삭제했다가 다시 unlike로 변경해줘야하고 처음 누르는거라면 아이디랑 비교해서 추가를 해주는것
  //아이디를 기준으로 처음이라면 insert 다시 한거라면 update

  $result = mysqli_query($dbConn,$sql);
  $fetch_data = mysqli_fetch_array($result);
  $count = $fetch_data['cntpost'];

  //echo $count;

  if($count == 0){//테이블에 나의 아이디로 해당 상품에 좋아요, 싫어요 누른 적이 없고 따라서 데이터가 없다면 데이터 삽입
    $insert_query = "INSERT INTO zay_like_unlike(ZAY_like_unlike_userid,ZAY_like_unlike_postid,ZAY_like_unlike_type) VALUES('{$useridx}','{$post_id}','{$type}')";
    mysqli_query($dbConn,$insert_query);
  }else{//누른 적이 있어서 데이터가 있다면 업데이트
    $update_query = "UPDATE zay_like_unlike SET ZAY_like_unlike_type=$type WHERE ZAY_like_unlike_userid=$useridx AND ZAY_like_unlike_postid=$post_id";
    mysqli_query($dbConn,$update_query);
  }

  $sql1="SELECT COUNT(*) AS totalLikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=1 AND ZAY_like_unlike_postid=$post_id";
  $result1 = mysqli_query($dbConn, $sql1);
  $fetch_likes = mysqli_fetch_array($result1);
  $total_likes = $fetch_likes['totalLikes']; //좋아요 총 갯수

  //echo $total_likes;
  $sql2="SELECT COUNT(*) AS totalunLikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=0 AND ZAY_like_unlike_postid=$post_id";
  $result2 = mysqli_query($dbConn, $sql2);
  $fetch_unlikes = mysqli_fetch_array($result2);
  $total_unlikes = $fetch_unlikes['totalunLikes']; //싫어요 총 갯수

  //json파일을 만들기위해 배열을 만들어야함
  $total_arr = array("likes" => $total_likes, "unlikes" => $total_unlikes);
  //echo $total_unlikes;

  echo json_encode($total_arr);

?>