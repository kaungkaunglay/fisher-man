  document.addEventListener('DOMContentLoaded', () => {
    const cardListBtns = document.querySelectorAll('#card-list-btn');
    const rowListBtns = document.querySelectorAll('#row-list-btn');
    const viewLists = document.querySelectorAll('#view-list');
    
    viewLists.forEach(viewList => {
      viewList.className = 'card-list';
    });
    
    cardListBtns.forEach(button => {
      button.addEventListener('click', () => {
        const index = Array.from(cardListBtns).indexOf(button);
        if (viewLists[index]) {
          viewLists[index].className = 'card-list';
        }
      });
    });
    
    rowListBtns.forEach(button => {
      button.addEventListener('click', () => {
        const index = Array.from(rowListBtns).indexOf(button);
        if (viewLists[index]) {
          viewLists[index].className = 'row-list';
        }
      });
    });
  });

  //number range change /////

  window.addEventListener("load", function () {
    const slider1 = document.getElementById("slider-1");
    const slider2 = document.getElementById("slider-2");
    const minPriceInput = document.getElementById("min-price-input");
    const maxPriceInput = document.getElementById("max-price-input");
    const minPriceHidden = document.getElementById("min-price-hidden");
    const maxPriceHidden = document.getElementById("max-price-hidden");
    const track = document.querySelector(".slider-track");
    const form = document.getElementById("priceRangeForm");

    function formatNumberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function parseFormattedNumber(string) {
        return parseInt(string.replace(/,/g, ""));
    }

    function updateSlider() {
        let percent1 = ((slider1.value - slider1.min) / (slider1.max - slider1.min)) * 100;
        let percent2 = ((slider2.value - slider1.min) / (slider1.max - slider1.min)) * 100;

        track.style.background = `linear-gradient(to right, #dadae5 ${percent1}%, #3264fe ${percent1}%, #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
        minPriceInput.value = formatNumberWithCommas(slider1.value);
        maxPriceInput.value = formatNumberWithCommas(slider2.value);
        minPriceHidden.value = slider1.value;
        maxPriceHidden.value = slider2.value;
    }

    function handleTextInput(input, slider, hiddenInput) {
        input.addEventListener("input", function (e) {
            let value = e.target.value.replace(/[^\d,]/g, "");
            value = value.replace(/,/g, "");

            if (value === "") value = "0";
            let numValue = parseInt(value);
            if (numValue < 1) numValue = 1;
            if (numValue > 50000) numValue = 50000;
            slider.value = numValue;
            hiddenInput.value = numValue;
            e.target.value = formatNumberWithCommas(numValue);

            updateSlider();
        });
        input.addEventListener("blur", function (e) {
            let value = parseFormattedNumber(e.target.value);
            e.target.value = formatNumberWithCommas(value);
            hiddenInput.value = value;
        });
    }

    slider1.addEventListener("input", function () {
        const minVal = parseInt(slider1.value);
        const maxVal = parseInt(slider2.value);

        if (minVal > maxVal) {
            slider1.value = maxVal;
        }
        updateSlider();
    });
    slider2.addEventListener("input", function () {
        const minVal = parseInt(slider1.value);
        const maxVal = parseInt(slider2.value);

        if (maxVal < minVal) {
            slider2.value = minVal;
        }
        updateSlider();
    });

    handleTextInput(minPriceInput, slider1, minPriceHidden);
    handleTextInput(maxPriceInput, slider2, maxPriceHidden);

    [slider1, slider2].forEach((slider) => {
        slider.addEventListener("change", () => form.submit());
    });

    updateSlider();
});
