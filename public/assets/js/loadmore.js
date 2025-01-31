const itemsPerPage = 24; // Number of items to display per batch
let currentVisible = 0; // Number of currently visible items

const productCards = document.querySelectorAll('.all-products .item-card');
const loadMoreBtn = document.getElementById('load-more');
// console.log(productCards);

// Function to show the next batch of items
const showMoreItems = () => {
   
  const nextBatch = Array.from(productCards).slice(
    currentVisible,
    currentVisible + itemsPerPage
  );
//   console.log(nextBatch);
  nextBatch.forEach((card) => {
    card.style.display = 'block'; // Make the card visible
  });
  currentVisible += itemsPerPage;

  // Hide the button if all items are displayed
  if (currentVisible >= productCards.length) {
    loadMoreBtn.style.display = 'none';
  }
};

// Initial load
showMoreItems();

// Event listener for "Load More" button
loadMoreBtn.addEventListener('click', showMoreItems);