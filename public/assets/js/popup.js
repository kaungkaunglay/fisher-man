const hamburgerMenu = document.getElementById("hamburger-menu");
const categoryPopup = document.getElementById("category-popup");
const closePopup = document.getElementById("close-popup");
const seeMoreLink = document.getElementById("see-more-link");
const categoryLink = document.getElementById("category-link");


hamburgerMenu.addEventListener("click", function (event) {
  event.preventDefault();
  categoryPopup.classList.toggle("active");
});


categoryLink.addEventListener("click", function (event) {
  event.preventDefault();
  console.log('hello');
  categoryPopup.classList.toggle("active");
});


closePopup.addEventListener("click", function (event) {
  event.preventDefault();
  categoryPopup.classList.remove("active");
});

document.addEventListener("click", function (event) {
  if (
    !categoryPopup.contains(event.target) &&
    !hamburgerMenu.contains(event.target) &&
    !categoryLink.contains(event.target) &&
    (!seeMoreLink || !seeMoreLink.contains(event.target))
  ) {
    categoryPopup.classList.remove("active");
  }
});

if(seeMoreLink) {
  seeMoreLink.addEventListener("click", function (event) {
    event.preventDefault();
    categoryPopup.classList.toggle("active");
  });
}
