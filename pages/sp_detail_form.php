<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio Process</title>

  <!-- Favicon Link -->
  <link rel="shortcut icon" href="/schedule/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/schedule/images/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="/schedule/images/favicon.ico">

  <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Google Font Link -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

  <!-- Reset CSS Link -->
  <link rel="stylesheet" href="/schedule/css/reset.css">

  <!-- Plugin CSS Link -->
  <link rel="stylesheet" href="/schedule/lib/css/lightslider.css">
  <link rel="stylesheet" href="/schedule/lib/css/piechart.css">

  <!-- Main CSS Link -->
  <link rel="stylesheet" href="/schedule/css/style.css">

  <!-- Animation CSS Link -->
  <link rel="stylesheet" href="/schedule/css/animation.css">

  <!-- Media Query CSS Link -->
  <link rel="stylesheet" href="/schedule/css/media.css">

  <script defer>
    const hostname = window.location.href;
    //console.log(hostname);
    if(hostname == 'http://localhost/schedule/'){
      window.location.replace('http://localhost/schedule/index.php?key=database');
    }
  </script>
</head>
<body>
  
  <div class="wrapper">
    <!-- Main Dashboard Frame -->
    <div class="dashboard">

      <?php
        include $_SERVER['DOCUMENT_ROOT']."/schedule/include/header.php";
      ?>

      <section class="graph-ui detail">

        <?php
          include $_SERVER['DOCUMENT_ROOT']."/schedule/include/total_pofol.php";
        ?>
        
        <div class="each-pofol" id="each-pofol">
          <div>
            <div class="each-graph" id="each-graph">
              
            </div>
          </div>
        </div>

        <div class="detail-board">
          <div class="board-btns">
            <a href="?key=all" class="active">All</a>
            <a href="?key=database">Database</a>
            <a href="?key=api">API</a>
            <a href="?key=renewal">Renewal</a>
            <a href="?key=planning">Planning</a>
          </div>

          <div class="board-table">
            <ul>
              <li class="board-title">
                <span>번호</span>
                <span>분류</span>
                <span>제목</span>
                <span>등록일</span>
                <span>삭제</span>
              </li>

              <!--게시판 글 (api.php파일) 경로 이어줌-->
              <?php
              $include_path=$_GET['key']; //각각의 다른 키값을 include_path에다 저장함
                include $_SERVER['DOCUMENT_ROOT'].'/schedule/include/tabs/'.$include_path.'.php';
              ?>
              
            </ul>
          </div>
          <!--End of board table-->
          <div class="board-table-btn">
            <!-- <form action="#" class="search-box">
              <select>
                <option value="">아이디</option>
                <option value="">제목</option>
              </select>
              <input type="text">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form> -->
            <button type="button" class = "more-btn">더보기</button>
          </div>
        </div>
        
      </section>

    </div>
    <!-- End of Main Dashboard Frame -->
  </div>

  <!-- Jquery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Plugins Load -->
  <script src="/schedule/lib/js/lightslider.js"></script>
  <script src="/schedule/lib/js/jquery.easypiechart.min.js"></script>
  <!-- Vanilla JS Code Load -->
  <script src="/schedule/js/modalAjax.js"></script>
  <script src="/schedule/js/total_avg.js"></script>
  <script src="/schedule/js/index.js"></script>
  <!-- jQuery Code Load -->
  <script src="/schedule/js/jquery.index.js"></script>
  
  <!-- jquery code -->
  <script>
    $(function(){
      //더보기 버튼 기능
      $(".board-contents").hide(); //컨텐츠 가리는 코드
      $(".board-contents").slice(0, 5).show(); //컨텐츠를 0번부터 5개씩 잘라서(slice) 보여준다 (show)

      $(".more-btn").click(function(){
        //console.log($(".board-contents:hidden").length); 
        $(".board-contents:hidden").slice(0,5).show(); //more-btn을 클릭했을 때 .board-contents에서 현재 가려진것들(:hidden) 중에서 0번부터 5개씩 잘라서 보여준다.
      });
      //테이블 탭 활성화 기능
     
    });
  </script>

</body>
</html>