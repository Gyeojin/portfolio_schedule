<meta charset="UTF-8">
<?php
  $auth_code = $_POST['auth_code'];

  //echo $auth_code;

  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";//db 접속정보 로드
  $sql = "SELECT * FROM auth WHERE auth = '$auth_code'";

  $auth_result = mysqli_query($dbConn, $sql);
  $auth_match = mysqli_num_rows($auth_result); //mysqli(데이터베이스) 의 

  //var_dump($auth_match);

  if(!$auth_match){ //auth_match(인증비번)가 없다면 이전 페이지로 넘어가는 작업
    echo "
      <script>
        alert('인증 코드가 틀립니다.');
        history.go(-1);
      </script>
    ";
  } else {
    $auth_row = mysqli_fetch_array($auth_result);

    session_start();
    $_SESSION['usercode'] = $auth_row['auth'];//usercode를 session에 저장한다
    //저장한 뒤 index 페이지로 링크
    echo " 
      <script>
        location.href='/schedule/index.php';
      </script>
    ";
  }
?>