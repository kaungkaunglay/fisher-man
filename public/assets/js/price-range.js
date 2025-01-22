const slider = document.querySelector(".range-slider");
const progress = slider.querySelector(".prograss");
const minPriceInput = slider.querySelector(".min-price");
const maxPriceInput = slider.querySelector(".max-price");
const minInput = slider.querySelector(".min-input");
const maxInput = slider.querySelector(".max-input");

const updateProgress = () => {
    const minValue = parseInt(minInput.value);
    const maxValue = parseInt(maxInput.value);

    const range = maxInput.max - minInput.min;
    const valueRange = maxValue - minValue;

    const width = (valueRange / range) * 100;
    const minOffset = ((minValue - minInput.min) / range) * 100;

    progress.style.width = width + "%";

    progress.style.left = minOffset + "%";

    minPriceInput.value = minValue;
    maxPriceInput.value = maxValue;
};

const updateRange = (event) => {
    const input = event.target;

    let min = parseInt(minPriceInput.value);
    let max = parseInt(maxPriceInput.value);

    if (input === minPriceInput && max > min) {
        max = min;
        maxPriceInput.value = max;
    } else if (input === maxPriceInput && max < min) {
        min = max;
        minPriceInput.value = min;
    }

    minInput.value = min;
    maxInput.value = max;

    updateProgress();
};

minPriceInput.addEventListener("input", updateRange);
maxPriceInput.addEventListener("input", updateRange);

minInput.addEventListener("input", () => {
    if (parseInt(minInput.value) >= parseInt(maxInput.value)) {
        maxInput.value = minInput.value;
    }
    updateProgress();
});

maxInput.addEventListener("input", () => {
    if (parseInt(maxInput.value) <= parseInt(minInput.value)) {
        minInput.value = maxInput.value;
    }
    updateProgress();
});

updateProgress();
