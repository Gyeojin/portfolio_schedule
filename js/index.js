const conTxt = document.querySelectorAll('.con-txt p a');

conTxt.forEach(element => {
  // console.log(element.textContent.slice(0,10) + "...");
  const cutTxt = element.textContent.slice(0,10) + "...";
  element.textContent = cutTxt;
});
