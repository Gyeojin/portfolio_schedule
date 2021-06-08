<?php

  $sp_idx = 1;
  $sp_db = $_GET['db_prj'];
  $sp_api = $_GET['api_prj'];
  $sp_ren = $_GET['ren_prj'];
  $sp_pla = $_GET['pla_prj'];

  //echo $sp_idx, $sp_db, $sp_api, $sp_ren, $sp_pla;
  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php"; //db 접속정보 로드하기

  $sql = "UPDATE sp_rate SET Rate_db=db_prj, Rate_api=$sp_api, Rate_ren=$sp_ren, Rate_pla=$sp_pla WHERE RATE_idx=$sp_idx";

  mysqli_query($dbConn, $sql);

  $sql1 = "SELECT*FROM sp_rate WHERE RATE_idx=$sp_idx";
  $rate_result = mysqli_query($dbConn, $sql1);
  $arr = array();
  while($rate_row=mysqli_fetch_array($rate_result)){
    array_push($arr, array(
      'db_rate' => $rate_row['RATE_db'],
      'api_rate' => $rate_row['RATE_api'],
      'ren_rate' => $rate_row['RATE_ren'],
      'pla_rate' => $rate_row['RATE_pla']
    ));
  }

//var_dump($arr);
  file_put_contents($_SERVER["DOCUMENT_ROOT"].'/schedule/data/sp_rate.json',json_encode($arr));
?>