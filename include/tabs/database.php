<?php
  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
  $sql1 = "SELECT*FROM sp_table WHERE SP_cate = 'database' ORDER BY SP_idx DESC LIMIT 5"; //데이터베이스를 조회하여 불러들이는 문법
  $db_result = mysqli_query($dbConn, $sql1);
  $db_num = mysqli_num_rows($db_result);
  
  if($db_num == 0){
  ?>
  <li>
    <p>입력된 일정이 없습니다.</p>
  </li>
  <?php
    } else {
      while($db_row=mysqli_fetch_array($db_result)){ //결과값이 있다면 배열을 찾아 ta_row 변수에 저장
        $db_row_cate = $db_row['SP_cate']; //각 결과값들을 매치시키기 위해 각각의 변수에 저장
        $db_row_tit = $db_row['SP_tit'];
        $db_row_reg = $db_row['SP_reg'];
  ?>
  <li>
    <i class="fa fa-<?=$db_row_cate?>"></i>
    <div class="con-txt">
      <p><a href="#"><?=$db_row_tit?></a></p>
      <em><?=$db_row_reg?></em>
    </div>
  </li>
  <?php
      }
    }
?>