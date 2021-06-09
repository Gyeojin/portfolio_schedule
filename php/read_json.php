<?php

  $url = $_SERVER["DOCUMENT_ROOT"]."/schedule/data/sp_rate.json";
  //echo $url;

  $json_string = file_get_contents($url); //파일을 읽어들임
  echo $json_string;
?>