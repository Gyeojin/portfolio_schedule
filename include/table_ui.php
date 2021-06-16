 <!-- Table Contents on Right side -->
 <section class="table-ui">
  <div class="new-update">
    <div class="tit-box">
      <p>Recent Update</p>
      <a href="#">More</a>
    </div>

    <ul class="con-details">
      <?php
        include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";//db 접속정보 로드
        $sql = "SELECT * FROM sp_table ORDER BY SP_idx DESC LIMIT 5";
        $ta_result = mysqli_query($dbConn, $sql);

        if(!$ta_result){
      ?>
      <li>
        <p>입력된 일정이 없습니다.</p>
      </li>
      <?php
        } else {
          while($ta_row=mysqli_fetch_array($ta_result)){
            $ta_row_cate = $ta_row['SP_cate'];
            $ta_row_tit = $ta_row['SP_tit'];
            $ta_row_reg = $ta_row['SP_reg'];
      ?>
      <li>
        <i class="fa fa-<?=$ta_row_cate?>"></i>
        <div class="con-txt">
          <p><a href="#"><?=$ta_row_tit?></a></p>
          <em><?=$ta_row_reg?></em>
        </div>
      </li>
      <?php
          }
        }
      ?>
    </ul>
  </div>
  <div class="each-contents">
    <div class="each-btns">
      <button value='database' class="active">Database</button> <!--태그의 속성 : 태그 옆에 있는것-->
      <button value='thermometer-half'>API</button>
      <button value='clone'>Renewal</button>
      <button value='bar-chart-o'>Planning</button>
    </div>
    <ul class="con-details" id="con-details">
      
    </ul>
  </div>
</section>

<script>

    function reqListener (n) {
      // console.log(this.responseText); //문자열만 읽어옴 (정리 안된걸로 구분하면 될듯)
      //3. 읽어온 php 문자열을 json으로 변경 (파싱)
      jsonObj = JSON.parse(this.responseText); //json 형태로 파싱(변환) (콘솔에 찍어보면 배열로 잘 정리되어있음)
     // console.log(jsonObj);

      //14. 데이터 삽입할 jsonData 태그를 변수에 저장
      const jsonDom = document.querySelector('#con-details');
      //console.log(jsonDom);

      //4. abc 함수 정의 (내용 정의 XXX)
      function callTabs(n){
        //6. abc 함수 테스트 코드 작성
        //console.log("abc");
          //7. abc 함수에서 jsonObj 데이터 읽을 수 있는지 테스트
          //console.log(jsonObj);
            //8. jsonObj 데이터를 각각 하나씩 읽기 위해 반복문 작성 (데이터가 배열이기 때문) => 실제로 쓴 건 49번줄 'filter'
            // for (let i=0; i < jsonObj.length; i++){
            //   console.log(jsonObj[i]); //jsonObj 배열을 하나씩 분리시키기
            // }

        //jsonObj.forEach (elements => {}); //forEach 문법 구조
        // jsonObj.forEach (function(elements){
        //   console.log(elements);
        // });

        const result = jsonObj.filter(value => {
          //10. value의 데이터 중 sp_cate가 database와 같은 값 필터링
          // value.sp_cate == "database";
          //11. 테스트 후 return 추가
          return value.sp_cate == n;
          //9.value가 database 인 값만 필터링
          //value == "database";
        });

        //12. 필터링 된 결과값 확인 => 11번 줄로 이동 (jsonData div 생성)
        //console.log(result);

        //15. 필터링 결과값 반복문으로 읽은 후, jsonDom 변수에 태그 추가 (=jsomData 태그를 선택한 뒤 반복문 결과값을 추가함) => 16번 줄로 이동
        for(let i = 0; i < result.length; i++){
         // console.log(result[i].sp_idx); //반복되는것을 누적해서 읽어줘야 할때 : +=
          //탬플릿 문자열 : 백틱(`)으로 감싼 문자열 - 변수 처리는 ${} 안에 한다.
          jsonDom.innerHTML += `
          <li>
            <i class="fa fa-${result[i].sp_cate}"></i>
            <div class="con-txt">
              <p><a href="#">${result[i].sp_tit}</a></p>
              <em>${result[i].sp_reg}</em>
            </div>
          </li>
          `; 
        }
        
      }

      //17. 버튼 태그 btns 변수에 저장
      const btns = document.querySelectorAll('.each-btns button');
      //console.log(btns);

      //18. btns 반복문으로 읽음
      btns.forEach(value => {
        //console.log(value);
        //19. 각각의 버튼 클릭 시 실행될 클릭함수 작성
        value.addEventListener('click',function(){

          btns.forEach(btnItem => {
            btnItem.className = "";
          });
          //20.클릭한 버튼 this로 확인
          //console.log(this);

          //21.버튼에 value 속성 추가 후, 추가된 value의 값 확인
          //console.log(this.getAttribute('value'));

          //24. 버튼 클릭 시 jsonDom 태그 내부를 비움
          jsonDom.innerHTML = "";

          //22.vaule 값 itemVal 변수에 저장
          const itemVal = this.getAttribute('value');
          this.className = "active";
          
          //23. abc 함수 클릭 함수 안으로 이동 후, 파라미터를 itemVal 변수로 변경
          callTabs(itemVal);
        });
      });
      callTabs("database"); //-> 5. abc 함수 호출
    }

    //1. xmlhttpRequest 함수 문법 작성
    var oReq = new XMLHttpRequest(); //new : 생성자 함수 / XMLHttpRequest() : 통신하는 함수
    oReq.addEventListener("load", reqListener);
    //2. 비동기 통신 json data 파일 경로로 변경
    oReq.open("GET", "/schedule/php/read_table_json.php");
    oReq.send();

    
</script>