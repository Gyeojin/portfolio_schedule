<?php
  //쿠키와 마찬가지로 세션도 어떤 헤더보다도 먼저 생성해야만 합니다.
  session_start();
  if(isset($_SESSION['usercode'])){ //isset : 세션에 'authcode' 라는게 있는지 존재여부를 확인
    $authcode = $_SESSION['usercode'];
  } else {
    echo "
      <script>
        location.href='/schedule/pages/sp_auth.php';
      </script>
    ";
  }

?>

<header>
  <h2><a href="/schedule/index.php"><i class="custom-font"></i></a></h2>
  <ul class="gnb">
    <li class="active">
      <a href="/schedule/index.php"><i class="fa fa-trello"></i></a>
      <span class="nav-top"></span>
      <span class="nav-middle"></span>
      <span class="nav-effect"></span>
      <span class="nav-bottom"></span>
    </li>
    <li>
      <a href="/schedule/pages/sp_insert_form.php"><i class="fa fa-pencil"></i></a>
      <span class="nav-top"></span>
      <span class="nav-middle"></span>
      <span class="nav-effect"></span>
      <span class="nav-bottom"></span>
    </li>
    <li>
      <a href="/schedule/pages/sp_detail_form.php?key=all"><i class="fa fa-search"></i></a>
      <span class="nav-top"></span>
      <span class="nav-middle"></span>
      <span class="nav-effect"></span>
      <span class="nav-bottom"></span>
    </li>
  </ul>
  <a href="/schedule/php/sign_out.php" class="sign-out"><i class="fa fa-sign-out"></i></a>

  <div class="mobile-menu">
    <span></span>
    <span></span>
  </div>

  <ul class="mobile-menu-items">
    <li><a href="/schedule/index.php"><i class="fa fa-trello"></i></a></li>
    <li><a href="/schedule/pages/sp_insert_form.php"><i class="fa fa-pencil"></i></a></li>
    <li><a href="/schedule/pages/sp_detail_form.php?key=all"><i class="fa fa-search"></i></a></li>
    <li><a href="/schedule/php/sign_out.php"><i class="fa fa-sign-out"></i></a></li>
  </ul>
</header>

<script>
    const headerName = window.location.href; //현재 url 주소를 가져오는 함수
    //console.log(headerName);
    const headerBtns = document.querySelectorAll('.gnb li');
    const headerPage = ['index','sp_insert_form','detail'];
    //console.log(headerBtns);

    for (let i=0; i < headerBtns.length; i++){
      headerBtns[i].classList.remove('active');
      if(headerName.includes(headerPage[i])){
        headerBtns[i].classList.add('active');
      }
    }
  </script>