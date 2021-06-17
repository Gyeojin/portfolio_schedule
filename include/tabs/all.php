<?php
  $tabIdx = $_GET['key']; //디테일 폼 안의 탭 key 값을 변수에 저장
  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";//db 접속정보 로드
  //$sql = "SELECT * FROM sp_table ORDER BY SP_idx DESC";

  if($tabIdx ==  "all"){ //키 값이 all이면 데이터베이스 전체를 불러옴
    $sql = "SELECT * FROM sp_table ORDER BY SP_idx DESC";
  } else { //all이 아니면 받아온 key 값의 데이터베이스를 불러옴
    $sql = "SELECT * FROM sp_table WHERE SP_cate = '{$tabIdx}' ORDER BY SP_idx DESC"; //변수 넣을 때 '{}'하는 이유 : sql 언어에 php 언어를 집어넣어야 하기 때문
  }

  $board_result = mysqli_query($dbConn, $sql);

  while($board_row=mysqli_fetch_array($board_result)){ //fetch_array : 배열 (하나씩 저장해줌)
    $board_row_idx = $board_row['SP_idx'];
    $board_row_cate = $board_row['SP_cate'];
    $board_row_tit = $board_row['SP_tit'];
    $board_row_reg = $board_row['SP_reg'];
?>

<li class="board-contents">
  <span><?=$board_row_idx?></span>
  <span><?=$board_row_cate?></span>
  <span><a href="#"><?=$board_row_tit?></a></span>
  <span><?=$board_row_reg?></span>
  <span>
    <a href="/schedule/php/sp_delete.php?del_idx=<?=$board_row_idx?>" class="del-btn txt">삭제</a>
    <a href="/schedule/php/sp_delete.php?del_idx=<?=$board_row_idx?>" class="del-btn icon"><i class="fa fa-times"></i></a>
  </span>
</li>

<?php
  }
?>