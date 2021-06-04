//Cutting Contents Text
const conTxt = document.querySelectorAll('.con-txt p a');

conTxt.forEach(element => {
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
document.addEventListener('DOMContentLoaded', function() {

  let lWidth = 10;
  let tWidth = 8;
  let pieSize = 200;
  let eachpieSize = 0;
  let clearSet;
  const winWidth =  window.innerWidth;

  if(winWidth <= 1280 && winWidth > 950){
    pieSize = 150;
  } else if(winWidth <=950 && winWidth > 400){
    pieSize = 170;
  } else if(winWidth < 400){
    pieSize = 140;
  } else {
    pieSize = 200;
  }

  var chart = window.chart = new EasyPieChart(document.querySelector('.total-chart .chart'), {
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

  window.addEventListener('resize',function(){
    const winWidth =  window.innerWidth; //윈도우 사이즈가 줄어드는 것을 변수에 저장//

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

      document.querySelector('.total-chart .chart canvas').remove();
    
      var chart = window.chart = new EasyPieChart(document.querySelector('.total-chart .chart'), {
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

  //-------------------- each charts --------------------//

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

  const poData = [
    {poKind:'.db-pofol', bColor:'#7c41f5', tColor:'#cfb8fc'},
    {poKind:'.api-pofol', bColor:'#ff9062', tColor:'#ffcbb5'},
    {poKind:'.renewal-pofol', bColor:'#3acbe8', tColor:'#cff7ff'},
    {poKind:'.planning-pofol', bColor:'#ed8e8e', tColor:'#f7d2d2'},
  ];

  function startPie(){
    poData.map(value => {

      var chart = window.chart = new EasyPieChart(document.querySelector(value.poKind +' .chart'), {
      easing: 'easeOutElastic',
      delay: 3000,
      barColor: value.bColor,
      trackColor: value.tColor,
      scaleColor: false,
      lineWidth: lWidth,
      trackWidth: tWidth,
      size: eachpieSize,
      lineCap: 'round',
      onStep: function(from, to, percent) {
        this.el.children[0].innerHTML = Math.round(percent);
        }
      });
    });
  }
  startPie();
});
