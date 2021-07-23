<li class="comm_tit">
  <span>번호</span>
  <span>아이디</span>
  <span>제목</span>
  <span>등록일</span>
  <span>조회수</span>
</li>

<?php
  $page = $_GET["page"];
  //jq.comm_ajax에서 보낸 page라는 변수의 값을 불러온다
  //echo $page;

  if($page == ''){
    $page == 1;
  }

  $view_per_page = 5;
  $from = ($page - 1) * $view_per_page;

  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
  $sql = "SELECT * FROM zay_comm ORDER BY ZAY_comm_idx DESC LIMIT $from, $view_per_page";

  $comm_result = mysqli_query($dbConn,$sql);
  while($comm_row = mysqli_fetch_array($comm_result)){
    $comm_idx = $comm_row['ZAY_comm_idx'];
    $comm_id = $comm_row['ZAY_comm_id'];
    $comm_tit = $comm_row['ZAY_comm_tit'];
    $comm_reg = $comm_row['ZAY_comm_reg'];
    $comm_hit = $comm_row['ZAY_comm_hit'];

?>
<li class="comm_con">
  <span><?=$comm_idx?></span>
  <span><?=$comm_id?></span>
  <span><a href="/zay/pages/menu_page/community_details.php?detail_idx=<?=$comm_idx?>"><?=$comm_tit?></a></span>
  <span><?=$comm_reg?></span>
  <span><?=$comm_hit?></span>
</li>
<?php }?>