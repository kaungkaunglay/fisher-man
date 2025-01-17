const textElements = document.querySelectorAll("#moving-text p");
const screenWidth = window.innerWidth;
const movementSpeed = 2; 
const middlePoint = screenWidth / 2;
let currentTextIndex = 0;
let activeTextIndex = -1;

const positions = Array(textElements.length).fill(screenWidth);

function moveText() {
  textElements.forEach((element, index) => {
    if (positions[index] >= -element.offsetWidth) {
      positions[index] -= movementSpeed;
      element.style.left = `${positions[index]}px`;

      if (!element.classList.contains("active") && positions[index] <= screenWidth) {
        element.classList.add("active");
      }

      if (
        index === currentTextIndex &&
        positions[index] + element.offsetWidth / 2 <= middlePoint
      ) {
        currentTextIndex = (currentTextIndex + 1) % textElements.length;
        if (activeTextIndex !== index) {
          activeTextIndex = index;
          const nextIndex = (index + 1) % textElements.length;
          positions[nextIndex] = screenWidth;
          textElements[nextIndex].classList.add("active");
        }
      }

      if (positions[index] + element.offsetWidth < 0) {
        element.classList.remove("active");
      }
    }
  });

  requestAnimationFrame(moveText);
}

requestAnimationFrame(moveText);
