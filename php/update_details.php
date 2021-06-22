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

  //수정된 데이터 json 파일에 적용시키는 로직
  $sql1 = "SELECT * FROM sp_table ORDER BY SP_idx DESC";
  $update_result = mysqli_query($dbConn, $sql1);

  $arr = array();

  while($update_row = mysqli_fetch_array($update_result)){
    array_push($arr, array(
     'sp_idx' => $update_row['SP_idx'],
     'sp_cate' => $update_row['SP_cate'],
     'sp_tit' => $update_row['SP_tit'],
     'sp_con' => $update_row['SP_con'],
     'sp_reg' => $update_row['SP_reg']
    ));
  }

  file_put_contents($_SERVER["DOCUMENT_ROOT"].'/schedule/data/sp_table.json', json_encode($arr,JSON_UNESCAPED_UNICODE)); //json 코드로 만들어주는 과정 / JSON_UNESCAPED_UNICODE -> 데이터 한글이 깨지지 않게 하는 파라미터
  //
  
  echo "
    <script>
      alert('수정이 완료되었습니다.');
      location.href='/schedule/pages/sp_detail_view.php?pageNum=$update_num';
    </script>
  "

?>