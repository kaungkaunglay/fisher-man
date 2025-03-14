const itemsPerPage = 24; // Number of items to display per batch
let currentVisible = 0; // Number of currently visible items

const productCards = document.querySelectorAll('.all-products .item-card');
const loadMoreBtn = document.getElementById('load-more');

// Function to show the next batch of items
const showItems = () => {
  
  currentVisible = currentVisible + itemsPerPage;

  productCards.forEach((card, index) => {

    card.style.display = 'none';
    if(index <= currentVisible) {

      card.style.display = 'block'; // Make the card visible
    }
  });


  // Hide the button if all items are displayed
  if (currentVisible >= productCards.length) {
    loadMoreBtn.classList.add('d-none');
  }

  if (productCards.length <= itemsPerPage) {
    loadMoreBtn.classList.add('d-none');
  }
};

// Initial load
showItems();

// Event listener for "Load More" button
loadMoreBtn.addEventListener('click', showItems);