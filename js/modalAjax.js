//비동기 통신 해주는 것
$(function(){

  $.ajax({
    url: "/schedule/php/read_json.php", //객체1 (url)
    success: function(result){//객체2 (함수)
      //console.log(result);

      const obj = JSON.parse(result);

     // console.log(obj);
      //console.log(obj[0].db_rate);

      const dbRate = Number(obj[0].db_rate);
      const apiRate = Number(obj[0].api_rate);
      const renRate = Number(obj[0].ren_rate);
      const plaRate = Number(obj[0].pla_rate); //문자열을 숫자열로 바꿔주는 작업 (연산해야될 일이 많다)




      // console.log(result[0].api_rate);
    $(".rate-form").html(
      `<p>
        <label for="db_prj">DB Project</label>
        <input type="text" id="db_prj" value="${dbRate}" name="db_prj">
      </p>
      <p>
        <label for="api_prj">API Project</label>
        <input type="text" id="api_prj" value="${apiRate}" name="api_prj">
      </p>
      <p>
        <label for="ren_prj">Renewal Project</label>
        <input type="text" id="ren_prj" value="${renRate}" name="ren_prj">
      </p>
      <p>
        <label for="pla_prj">Planning Project</label>
        <input type="text" id="pla_prj" value="${plaRate}" name="pla_prj">
      </p>`
    );

    //$(".each-graph").html(
     // `<div class="db-pofol">
         // <span class="chart" data-percent="${result[0].db_rate}">
         //   <span class="percent"></span>
     //     </span>
     //     <b>DB Project</b>
     //     <i class="fa fa-database"></i>
     //   </div>
     //   <div class="api-pofol">
     //     <span class="chart" data-percent="${result[0].api_rate}">
     //       <span class="percent"></span>
       //   </span>
         // <b>API Project</b>
         // <i class="fa fa-thermometer-half"></i>
        //</div>
        //<div class="renewal-pofol">
        //  <span class="chart" data-percent="${result[0].ren_rate}">
         //   <span class="percent"></span>
         // </span>
         // <b>Renewal Project</b>
         // <i class="fa fa-clone"></i>
       // </div>
        //<div class="planning-pofol">
         // <span class="chart" data-percent="${result[0].pla_rate}">
           // <span class="percent"></span>
          //<b>Planning Project</b>
          //<i class="fa fa-bar-chart-o"></i>
        //</div>`
     // );
     $(".each-graph").html(
      `<div class="db-pofol">
        <span class="chart" data-percent="${dbRate}">
          <span class="percent"></span>
        </span>
        <b>DB Project</b>
        <i class="fa fa-database"></i>
      </div>
      <div class="api-pofol">
        <span class="chart" data-percent="${apiRate}">
          <span class="percent"></span>
        </span>
        <b>API Project</b>
        <i class="fa fa-thermometer-half"></i>
      </div>
      <div class="renewal-pofol">
        <span class="chart" data-percent="${renRate}">
          <span class="percent"></span>
        </span>
        <b>Renewal Project</b>
        <i class="fa fa-clone"></i>
      </div>
      <div class="planning-pofol">
        <span class="chart" data-percent="${plaRate}">
          <span class="percent"></span>
        </span>
        <b>Planning Project</b>
        <i class="fa fa-bar-chart-o"></i>
      </div>`
     );
    }
  });

});