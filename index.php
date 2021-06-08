<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio Schedule Process</title>

  <!-- Favicon Link -->
  <link rel="shortcut icon" href="/schedule/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/schedule/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="/schedule/img/favicon.ico"><!--애플용 아이콘-->

  <!--Font Awesome Link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Google web font link -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

  <!-- Reset CSS link -->
  <link rel="stylesheet" href="/schedule/css/reset.css">

  <!-- Plugin CSS Link -->
  <link rel="stylesheet" href="/schedule/lib/css/lightslider.css">
  <link rel="stylesheet" href="/schedule/lib/css/piechart.css">

  <!-- Main CSS link -->
  <link rel="stylesheet" href="/schedule/css/style.css">

  <!-- Animation CSS link -->
  <link rel="stylesheet" href="/schedule/css/animation.css">

  <!-- Media Query CSS link -->
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

      <section class="graph-ui">
        <div class="intro">
          <div class="slide-box">
            <h2>Database Project Process</h2>
            <p>데이터베이스 테이블 설계 완료.<br>테이블 UI 디자인 완료</p>
            <a href="#">More View</a>
            <i class="fa fa-database"></i>
          </div>
          <div class="slide-box">
            <h2>Database Project Process</h2>
            <p>API 테이블 설계 완료.<br>테이블 UI 디자인 완료</p>
            <a href="#">More View</a>
            <i class="fa fa-database"></i>
          </div>
          <div class="slide-box">
            <h2>Database Project Process</h2>
            <p>리뉴얼 테이블 설계 완료.<br>테이블 UI 디자인 완료</p>
            <a href="#">More View</a>
            <i class="fa fa-database"></i>
          </div>
          <div class="slide-box">
            <h2>Database Project Process</h2>
            <p>기획 테이블 설계 완료.<br>테이블 UI 디자인 완료</p>
            <a href="#">More View</a>
            <i class="fa fa-database"></i>
          </div>

        </div>
        <div class="each-pofol">
          <div>
            <div class="each-title">
              <h3>Each Portfolio Process Rate</h3>
            </div>
            <div class="each-graph">
              <div class="db-pofol">
                <span class="chart" data-percent="86">
                  <span class="percent"></span>
                </span>
                <b>DB Project</b>
                <i class="fa fa-database"></i>
              </div>
              <div class="api-pofol">
                <span class="chart" data-percent="60">
                  <span class="percent"></span>
                </span>
                <b>API Project</b>
                <i class="fa fa-thermometer-half"></i>
              </div>
              <div class="renewal-pofol">
                <span class="chart" data-percent="20">
                  <span class="percent"></span>
                </span>
                <b>Renewal Project</b>
                <i class="fa fa-clone"></i>
              </div>
              <div class="planning-pofol">
                <span class="chart" data-percent="50">
                  <span class="percent"></span>
                </span>
                <b>Planning Project</b>
                <i class="fa fa-bar-chart-o"></i>
              </div>
            </div>
          </div>
        </div>
        
        <?php
        include $_SERVER['DOCUMENT_ROOT']."/schedule/include/total-pofol.php";
        ?>

      </section>
      
      <?php
        include $_SERVER['DOCUMENT_ROOT']."/schedule/include/table-ui.php";
      ?>

    </div>

  <!-- 2.모달박스 UI 제작 => style.css 140번줄-->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <!-- <span class="close" id="times">&times;</span>
      <p>Some text in the Modal..</p> -->
      <form action="/schedule/php/sp_rate_insert.php" class="rate-form" name="rate_form"> <!--php파일 연결해줄 경로 지정-->
        <p>
          <label for="db_prj">DB Project</label>
          <input type="text" id="db_prj" value="78" name="db_prj">
        </p>
        <p>
          <label for="api_prj">API Project</label>
          <input type="text" id="api_prj" value="60" name="api_prj">
        </p>
        <p>
          <label for="ren_prj">Renewal Project</label>
          <input type="text" id="ren_prj" value="55" name="ren_prj">
        </p>
        <p>
          <label for="pla_prj">Planning Project</label>
          <input type="text" id="pla_prj" value="90" name="pla_prj">
        </p>
      </form>
      <div class="updateBtnBox">
        <button type="button" id="updateBtn">Update Rate</button>
      </div>
    </div>
    <script>
      const updateBtn = document.querySelector('#updateBtn');
      updateBtn.onclick = function(){
        document.rate_form.submit();
      }
    </script>
  </div>
  <!-- Jquery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Plugins Load -->
  <script src="/schedule/lib/js/lightslider.js"></script>
  <script src="/schedule/lib/js/easypiechart.js"></script>
  <!-- Vanilla JS code Load -->
  <script src="/schedule/js/index.js"></script>
  <!-- Jquery Code Load -->
  <script src="/schedule/js/jquery.index.js"></script>
</body>
</html>