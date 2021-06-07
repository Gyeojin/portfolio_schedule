<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SP_insert</title>

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

</head>
<body>
<div class="wrapper">
    <!-- Main Dashboard Frame -->
    <div class="dashboard">
      <?php
        include $_SERVER['DOCUMENT_ROOT']."/schedule/include/header.php";
      ?>

      <section class="graph-ui">
        <?php
        include $_SERVER['DOCUMENT_ROOT']."/schedule/include/total-pofol.php";
        ?>

        <div class="input-box">
          <div class="title-box">
            <h3>Today's Schedule</h3>
          </div>
          <form action="/schedule/php/sp_insert.php" method="post" name="spInputForm">
            <div class="input-tit">
              <input type="text" placeholder="일정 요약을 입력해 주세요." name="spInputTit">
              <select name="spInputCate">
                <option value="database">DB Project</option>
                <option value="thermometer-half">API Project</option>
                <option value="clone">Renewal Project</option>
                <option value="bar-chart-o">Planning Project</option>
              </select>
            </div>
            <div class="input-con">
              <textarea placeholder="상세 일정을 작성해 주세요." name="spInputCon"></textarea>
            </div>
          </form>

          <div class="btns">
            <button type="button" onclick="sp_insert()">진행 상황 작성</button>
          </div>
          <script>
            function sp_insert(){ // !:부정하는 문법?
              if(!document.spInputForm.spInputTit.value){
                alert('일정 요약을 작성해 주세요.');
                document.spInputForm.spInputTit.focus();
                return;
              }

              if(!document.spInputForm.spInputCon.value){
                alert('상세 일정을 작성해 주세요.');
                document.spInputForm.spInputCon.focus();
                return;
              }

              document.spInputForm.submit();
            }
          </script>
        </div>
      </section>

      <?php
        include $_SERVER['DOCUMENT_ROOT']."/schedule/include/table-ui.php";
      ?>
    </div>
  </div>
    <!-- End of Main Dashboard Frame -->
</body>
</html>