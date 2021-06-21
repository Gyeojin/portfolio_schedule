<?php
  //세션을 삭제할 때는 unset() 함수를 사용한다 (=logout과 같은 의미)
  session_start();
  unset($_SESSION['usercode']);

  echo "
    <script>
      location.href='/schedule/index.php';
    </script>
  ";

?>