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
  const winWidth =  window.innerWidth;

  if(winWidth <= 950){
    lWidth = 5;
    tWidth = 4;
  } else {
    lWidth = 10;
    tWidth = 8;
  }

  var chart = window.chart = new EasyPieChart(document.querySelector('.total-chart .chart'), {
    easing: 'easeOutElastic',
    delay: 3000,
    barColor: 'red',
    trackColor: '#ace',
    scaleColor: false,
    lineWidth: 18,
    trackWidth: 18,
    size: 200,
    lineCap: 'butt',
    onStep: function(from, to, percent) {
      this.el.children[0].innerHTML = Math.round(percent);
    }
  });


  const poData = [
    {poKind:'.db-pofol', bColor:'#7c41f5', tColor:'#cfb8fc'},
    {poKind:'.api-pofol', bColor:'#ff9062', tColor:'#ffcbb5'},
    {poKind:'.renewal-pofol', bColor:'#3acbe8', tColor:'#cff7ff'},
    {poKind:'.planning-pofol', bColor:'#ed8e8e', tColor:'#f7d2d2'},
    // {poKind:'.total-chart', bColor:'#f0d41b', tColor:'#F0ED9F'}
  ];

  function startPie(){
    poData.map(value => {
      // console.log(value.a);

      var chart = window.chart = new EasyPieChart(document.querySelector(value.poKind +' .chart'), {
      easing: 'easeOutElastic',
      delay: 3000,
      barColor: value.bColor,
      trackColor: value.tColor,
      scaleColor: false,
      lineWidth: lWidth,
      trackWidth: tWidth,
      lineCap: 'round',
      onStep: function(from, to, percent) {
        this.el.children[0].innerHTML = Math.round(percent);
        }
      });
    });
  }
  startPie();
});
