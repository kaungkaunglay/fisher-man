$(document).ready(function () {
  const sliderOne = $("#slider-1");
  const sliderTwo = $("#slider-2");
  const sliderTrack = $(".slider-track");
  const minInput = $(".min-price");
  const maxInput = $(".max-price");

  let minGap = 0;
  let sliderMaxValue = parseInt(sliderOne.attr("max"));

  function slideOne() {
      let sliderOneValue = parseInt(sliderOne.val());
      let sliderTwoValue = parseInt(sliderTwo.val());

      if (sliderTwoValue - sliderOneValue <= minGap) {
          sliderOne.val(sliderTwoValue - minGap);
      }

      minInput.val(sliderOne.val());
      fillColor();
  }

  function slideTwo() {
      let sliderOneValue = parseInt(sliderOne.val());
      let sliderTwoValue = parseInt(sliderTwo.val());

      if (sliderTwoValue - sliderOneValue <= minGap) {
          sliderTwo.val(sliderOneValue + minGap);
      }

      maxInput.val(sliderTwo.val());
      fillColor();
  }

  function fillColor() {
      let percent1 = (parseInt(sliderOne.val()) / sliderMaxValue) * 100;
      let percent2 = (parseInt(sliderTwo.val()) / sliderMaxValue) * 100;
      
      sliderTrack.css("background", `linear-gradient(to right, #dadae5 ${percent1}% , #005B96 ${percent1}% , #005B96 ${percent2}%, #dadae5 ${percent2}%)`);
  }

  function syncMinPrice() {
      let value = parseInt(minInput.val());
      let maxValue = parseInt(sliderTwo.val());

      if (value < parseInt(sliderOne.attr("min"))) value = parseInt(sliderOne.attr("min"));
      if (value > maxValue - minGap) value = maxValue - minGap;

      sliderOne.val(value);
      fillColor();
  }

  function syncMaxPrice() {
      let value = parseInt(maxInput.val());
      let minValue = parseInt(sliderOne.val());

      if (value > sliderMaxValue) value = sliderMaxValue;
      if (value < minValue + minGap) value = minValue + minGap;

      sliderTwo.val(value);
      fillColor();
  }

  sliderOne.on("input", slideOne);
  sliderTwo.on("input", slideTwo);

  minInput.on("input", function () {
      syncMinPrice();
      slideOne();
  });

  maxInput.on("input", function () {
      syncMaxPrice();
      slideTwo();
  });

  // Initialize
  slideOne();
  slideTwo();
});