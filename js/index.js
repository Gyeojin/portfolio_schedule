
let contentText = document.querySelectorAll('.con-txt p a');

contentText.forEach(element => {
  // console.log(element.textContent.slice(0,10) + "...");
  const cutTxt = element.textContent.slice(0,10) + "...";
  element.textContent = cutTxt;
});

//Mobile Menu Activate
const mobileMenu = document.querySelector('.mobile-menu');

mobileMenu.onclick = () => {
  mobileMenu.classList.toggle('active');
}



//Pie Chart Rendering Code
$(function(){
  $(window).ajaxComplete(function(){
    let lWidth = 10;
    let tWidth = 8;
    let pieSize = 200;
    let eachpieSize = 0;
    let clearSet;
    const winWidth = $(window).width();

    if(winWidth <= 1280 && winWidth > 950){
      pieSize = 150;
    } else if(winWidth <=950 && winWidth > 400){
      pieSize = 170;
    } else if(winWidth < 400){
      pieSize = 140;
    } else {
      pieSize = 200;
    }

  $('.total-chart .chart').easyPieChart({
    easing: 'easeOutElastic',
    delay: 3000,
    barColor: 'red',
    trackColor: '#ace',
    scaleColor: false,
    lineWidth: 18,
    trackWidth: 18,
    size: pieSize,
    lineCap: 'butt',
    onStep: function(from, to, percent) {
      this.el.children[0].innerHTML = Math.round(percent);
    }
  });

  //window.addEventListener('resize',function(){
    $(window).resize(function(){
      const winWidth = $(window).width(); //윈도우 사이즈가 줄어드는 것을 변수에 저장//

      if(winWidth <= 1280 && winWidth > 950){
        pieSize = 150;
      } else if(winWidth <=950 && winWidth > 400){
        pieSize = 170;
      } else if(winWidth <= 400){
        pieSize = 140;
      } else {
        pieSize = 200;
      }

    clearTimeout(clearSet);
    clearSet = setTimeout(function(){

      // $('.total-chart .chart').removeData('easyPieChart').remove();
    
      //var chart = window.chart = new EasyPieChart(document.querySelector('.total-chart .chart'), {
        $('.total-chart .chart').easyPieChart({
          easing: 'easeOutElastic',
          delay: 3000,
          barColor: 'red',
          trackColor: '#ace',
          scaleColor: false,
          lineWidth: 18,
          trackWidth: 18,
          size: pieSize,
          Animate : 1000,
          lineCap: 'butt',
          onStep: function(from, to, percent) {
            this.el.children[0].innerHTML = Math.round(percent);
          }
      });
    }, 150);
  });
  //-------------------- each charts ------------------//

  if(winWidth <= 950){
    lWidth = 5;
    tWidth = 4;
  } else {
    lWidth = 10;
    tWidth = 8;
  }

  if(winWidth <= 1280){
    eachpieSize = 90;
  } else {
    eachpieSize = 110;
  }

  //$(window).ajaxComplete(function(){

    const poData = [
    {poKind:'.db-pofol', bColor:'#7c41f5', tColor:'#cfb8fc'},
    {poKind:'.api-pofol', bColor:'#ff9062', tColor:'#ffcbb5'},
    {poKind:'.renewal-pofol', bColor:'#3acbe8', tColor:'#cff7ff'},
    {poKind:'.planning-pofol', bColor:'#ed8e8e', tColor:'#f7d2d2'},
    ];

    function startPie(){
      poData.map(value => {

     // var chart = window.chart = new EasyPieChart(document.querySelector(value.poKind +' .chart'), {
        $(value.poKind +' .chart').easyPieChart({
        easing: 'easeOutElastic',
        delay: 3000,
        barColor: value.bColor,
        trackColor: value.tColor,
        scaleColor: false,
        lineWidth: 5,
        trackWidth: 5,
        size: 110,
        lineCap: 'round',
        onStep: function(from, to, percent) {
          this.el.children[0].innerHTML = Math.round(percent);
        }
      });
    });
  }
  startPie();

  }); 
});

//Open Modal for Input Rates//
//1. 버튼 DOM 저장 => index.php 134줄
const modalBtn = document.querySelector('#open-modal');

//5. modal 변수에 모달박스 DOM 저장
const modal = document.querySelector('#myModal');

//6. X 버튼 DOM 저장
const times = document.querySelector('#times');

//4. modalBtn을 클릭했을 때 모달 박스 보이기
modalBtn.onclick = function() {
  modal.style.display = "block";
}

//7. X 버튼 클릭 시 모달창 제거
times.onclick = function() {
  modal.style.display = "none";
}

// 8. 모달 이외 영역 클릭 시 모달창 제거
window.onclick = function(event) {//윈도우 전체를 클릭했을 때 event 함수를 실행시킴
  if (event.target == modal) {//만약 이벤트 타겟이 modal일 경우 modal의 style의 display가 none으로.
    modal.style.display = "none";
  }
}