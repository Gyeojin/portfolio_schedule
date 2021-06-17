<!-- <?php

  echo "우하하!";

?> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>auth page</title>

  <!-- Reset CSS Link -->
  <link rel="stylesheet" href="/schedule/css/reset.css">

  <style>
    .wrap{width:100%; height: 100vh; display: flex; align-items: center; justify-content: center; background: #f9f9f9;}
  </style>

</head>
<body>
  <div class="wrap">
    <form action="/schedule/php/auth.php" method="post" name="auth_form">
      <input type="password" placeholder="인증코드를 입력해 주세요." name="auth_code">
      <button type="button">인증하기</button>
    </form>
    <!--버튼 타입이 submit 이면 버튼 클릭 시 form 태그에 링크된 곳으로 감-->
  </div>
  <script>
    const authCode=document.querySelector('button');

    authCode.addEventListener('click',function(){
      if(!document.auth_form.auth_code.value){
        alert('인증 코드를 입력해 주세요!');
        return;
      }
      document.auth_form.submit();
    });

  </script>
</body>
</html>