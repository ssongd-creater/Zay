<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome || Join</title>
</head>
<body>
  <form action="/zay/php/login.php" name="login_form" method="post">
    <p>아이디 : <input type="text" name="login_id"></p>
    <p>비밀번호 : <input type="password" name="login_pass"></p>
    <button type="button" id="login_btn">로그인</button>
  </form>

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