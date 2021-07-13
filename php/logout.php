<?php

  session_start();

  unset($_SESSION['userid']);
  unset($_SESSION['userprofile']);

  echo "
    <script>
      location.href='/zay/index.php';
    </script>
  ";


?>