<!-- <?php

  echo "우하하!";

?> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <title>auth page</title>

  <!-- Reset CSS Link -->
  <link rel="stylesheet" href="/schedule/css/reset.css">

  <style>
    .wrap{width:100%; height: 100vh; display: flex; align-items: center; justify-content: center; background: #f9f9f9;}
    .wrap form{width:100%; height:auto; display: flex; justify-content:center;}
    .wrap form input{outline:0; border-radius:10px 0 0 10px; border: 1px solid #7c41f5; padding:10px;}
    .wrap form button {background: #7c41f5; outline:0; border: 1px solid #7c41f5; color:#fff; border-radius:0 10px 10px 0; margin:0 1px; padding:0 10px;}

    @media screen and (max-width:400px){
      .wrap form input{font-size:12px;}
      .wrap form button {font-size:12px;}
    }
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

    //엔터 이벤트 : 각 키보드마다 부여된 value 값을 이용하여 만듦. (keyboard keycode)
    authCode.addEventListener('click',sendAuth);
    document.addEventListener('keydown',function(e){
      const keyCode = e.keyCode;
      //console.log(keyCode);
      if(keyCode == 13){
        sendAuth();
      }
    });
    function sendAuth(){
      if(!document.auth_form.auth_code.value){
          alert('인증 코드를 입력해 주세요!');
          return;
      }
      document.auth_form.submit();
    }

    //console.log(this);

  </script>
</body>
</html>