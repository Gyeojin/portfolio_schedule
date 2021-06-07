<?php

  $spInputTit = addslashes($_POST['spInputTit']); //지정한 name으로 해당 값들을 불러오는 작업
  $spInputCon = addslashes($_POST['spInputCon']);
  //addslashes() : 입력 문자열 중 특수문자가 입력될 경우, 앞에 자동으로 '\'를 추가해주는 함수
  $spInputCate = $_POST['spInputCate'];
  $regDate = date("Y-m-d");

  //echo $spInputTit, $spInputCon, $spInputCate, $regDate;

  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php"; //db 접속정보 로드하기
  $sql = "INSERT INTO sp_table (
    SP_cate,
    SP_tit,
    SP_con,
    SP_reg
  ) VALUES (
    '{$spInputCate}',
    '{$spInputTit}',
    '{$spInputCon}',
    '{$regDate}'
  )";
  // db 테이블과 입력값을 연결시키는 과정
  // 중괄호는 생략해도 상관 없음

  mysqli_query($dbConn, $sql);

  echo"
    <script>
      alert('작성이 완료되었습니다!');
      location.href='/schedule/pages/sp_insert_form.php';
    </script>
  ";

?>