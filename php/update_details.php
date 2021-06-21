<?php

  $update_num = $_REQUEST['update_num'];

  $update_tit = nl2br($_REQUEST['update_tit']); //받아와야 할 네임값들 넣어줌 -> sp_detail_view.php 파일
  $update_con = nl2br($_REQUEST['update_con']); //nl2br:자동개행
  $update_tit = addslashes($update_tit);//자동 개행된 값을 또 받아와 슬래시 추가해주는 함수로 재할당
  $update_con = addslashes($update_con);
  //addslashes() : 입력 문자열 중 특수 문자가 입력될 경우 앞에 자동으로 '\'를 추가해주는 함수
  //echo $update_tit, $update_num, $update_con;

  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";//db 접속정보 로드
  $sql = "UPDATE sp_table SET SP_tit = '$update_tit', SP_con = '$update_con' WHERE SP_idx = $update_num"; //문자열: 따옴표 , 숫자 : 따옴표 X

  //5. 데이터 값 변경 : UPDATE [TABLE_NAME] SET [변경할 필드명] = [변경 값] WHERE [변경할 필드 조건]
  //8번 인덱스 데이터의 이름을 김철수로 변경
  //$sql = "UPDATE members SET name = '김철수' WHERE idx=8";

  mysqli_query($dbConn, $sql);

  echo "
    <script>
      alert('수정이 완료되었습니다.');
      location.href='/schedule/pages/sp_detail_view.php?pageNum=$update_num';
    </script>
  "

?>