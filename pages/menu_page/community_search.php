
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <title>Zay shop || Community</title>
  <!-- Favicon Link -->
  <link rel="shortcut icon" href="/zay/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/zay/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="/zay/img/favicon.ico">
  <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Reset CSS Link -->
  <link rel="stylesheet" href="/zay/css/reset.css">
  <!-- Main Style CSS Link -->
  <link rel="stylesheet" href="/zay/css/style.css">
  <!-- Media Style CSS Link -->
  <link rel="stylesheet" href="/zay/css/media.css">
</head>
<body>

<?php include $_SERVER["DOCUMENT_ROOT"]."/zay/include/header.php";?>

<section class="community">
    <div class="center">
      <div class="tit_box">
        <h2>Search Results</h2>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt<br>mollit anim id est laborum.</p>
      </div>
      <div class="comm_table comm_center">
        <ul class="comm_row">
          <li class="comm_tit">
            <span>번호</span>
            <span>아이디</span>
            <span>제목</span>
            <span>등록일</span>
            <span>조회수</span>
          </li>

          <?php
            $search_select = $_POST['qna_search'];
            $search_input = $_POST['search_txt'];
            //echo $search_select,$search_input;

            include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
            if($search_select == 'id_search'){
              $sql_search="SELECT * FROM zay_comm WHERE ZAY_comm_id LIKE '%$search_input%' ORDER BY ZAY_comm_idx DESC";
              // 앞뒤로 상관없이 search_input 값을 가져오는것,  %가 앞에만있으면 앞에 쓴글와는 상관없이/뒤에만 %있으면 뒤에 쓴글 상관없이
            }else{
              $sql_search="SELECT * FROM zay_comm WHERE ZAY_comm_tit LIKE '%$search_input%' ORDER BY ZAY_comm_idx DESC";
            }

            $search_result = mysqli_query($dbConn,$sql_search);
            $search_result_num = mysqli_num_rows($search_result);

            //echo $search_result_num;
            if(! $search_result_num){
              echo"<li>데이터가 존재하지 않습니다. 검색 조검 및 검색어를 확인해 주세요.</li>";
            }else{
              while($search_result_row = mysqli_fetch_array($search_result)){
                $search_idx = $search_result_row['ZAY_comm_idx'];
                $search_id = $search_result_row['ZAY_comm_id'];
                $search_tit = $search_result_row['ZAY_comm_tit'];
                $search_reg = $search_result_row['ZAY_comm_reg'];
                $search_hit = $search_result_row['ZAY_comm_hit'];
          ?>
          <li class="comm_con">
            <span><?=$search_idx?></span>
            <span><?=$search_id?></span>
            <span><a href="/zay/pages/menu_page/community_details.php?detail_idx=<?=$search_idx?>"><?=$search_tit?></a></span>
            <span><?=$search_reg?></span>
            <span><?=$search_hit?></span>
          </li>
          <?php } } ?>
        </ul>
      </div>
      <!-- End of comm_table -->
    </div>
  </section>

  <?php include $_SERVER['DOCUMENT_ROOT']."/zay/include/footer.php"?>
  

  <!-- jQuery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>
</body>
</html>
