<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <title>Zay shop || Join</title>
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

<section class="join">
    <div class="center">
      <div class="form_box">

        <form action="/zay/php/login.php" name="login_form" method="post" class="com_form login_form"
        >
          <p>
            <label>아이디</label><input type="text" name="login_id" placeholder="아이디">
          </p>
          <p>
            <label>비밀번호</label><input type="password" name="login_pass" autocomplete="off" placeholder="비밀번호">
          </p>
          
          <div class="submit_info">
            <button type="button" id="login_btn">로그인</button>
            <span>아직 회원이 아니면<a href="/zay/pages/join/join_form.php">click</a></span>
          </div>
          
        </form>
      </div>
    </div>
  </section>

  <?php include $_SERVER['DOCUMENT_ROOT']."/zay/include/footer.php"?>
  

  <!-- jQuery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>
  <script>
  const loginBtn = document.querySelector("#login_btn");

    loginBtn.addEventListener('click', function(){
      if(!document.login_form.login_id.value){
        alert(' 아이디를 입력해 주세요');
        document.login_form.login_id.focus();
        return;
      }

      if(!document.login_form.login_pass.value){
        alert(' 비밀번호를 입력해 주세요');
        document.login_form.login_pass.focus();
        return;
      }

      document.login_form.submit();
    });
</script>

</body>
</html>


<!-- <form action="/zay/php/login.php" name="login_form" method="post">
    <p>아이디 : <input type="text" name="login_id"></p>
    <p>비밀번호 : <input type="password" name="login_pass"></p>
    <button type="button" id="login_btn">로그인</button>
  </form> -->

<!-- <script>
  const loginBtn = document.querySelector("#login_btn");

    loginBtn.addEventListener('click', function(){
      if(!document.login_form.login_id.value){
        alert(' 아이디를 입력해 주세요');
        document.login_form.login_id.focus();
        return;
      }

      if(!document.login_form.login_pass.value){
        alert(' 비밀번호를 입력해 주세요');
        document.login_form.login_pass.focus();
        return;
      }

      document.login_form.submit();
    });
</script> -->