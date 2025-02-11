window.onload = function(){
  slideOne();
  slideTwo();

  $('.min-price').on('input', () => {

    valueFill('#sldier-1', $('.min-price').val());
    console.log($('#sldier-1').val())
  })

  $('.max-price').on('input', () => {

    valueFill('#sldier-2', $('.max-price').val());
  })
}

const sliderOne = document.getElementById("slider-1");
const sliderTwo = document.getElementById("slider-2");
const sliderTrack = document.querySelector(".slider-track");
let minGap = 0;
let sliderMaxValue = document.getElementById("slider-1").max;

function slideOne(){
  if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
      sliderOne.value = parseInt(sliderTwo.value) - minGap;
  }
  valueFill('.min-price', sliderOne.value)
  fillColor();
}

function slideTwo(){
  if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
      sliderTwo.value = parseInt(sliderOne.value) + minGap;
  }
  valueFill('.max-price', sliderTwo.value)
  fillColor();
}

function fillColor(){
  percent1 = (sliderOne.value / sliderMaxValue) * 100;
  percent2 = (sliderTwo.value / sliderMaxValue) * 100;
  sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #005B96 ${percent1}% , #005B96 ${percent2}%, #dadae5 ${percent2}%)`;
}

function valueFill(target, value) {
  $(document).ready(() => {

    $(target).val(value);
  })
}