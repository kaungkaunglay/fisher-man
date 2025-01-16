document.addEventListener('DOMContentLoaded', function () {
    const itemsPerPage = 2;
    const reviewContainer = document.getElementById('reviewContainer');
    const reviews = Array.from(reviewContainer.getElementsByClassName('reviewer-card'));
    const paginationControls = document.getElementById('pagination-controls');

    const totalPages = Math.ceil(reviews.length / itemsPerPage);
    let currentPage = 1;

    function showPage(page) {
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        // Hide all reviews and only show the relevant ones
        reviews.forEach((review, index) => {
            if (index >= start && index < end) {
                review.classList.add('d-flex');
                review.classList.remove('d-none');
            } else {
                review.classList.remove('d-flex');
                review.classList.add('d-none');
            }
        });

        // Highlight active page button
        Array.from(paginationControls.querySelectorAll('.page-btn')).forEach((button, index) => {
            button.classList.toggle('active', index + 1 === page);
        });

        // Enable/disable Previous and Next buttons
        document.getElementById('prev-btn').disabled = page === 1;
        document.getElementById('next-btn').disabled = page === totalPages;

        currentPage = page; // Update current page
    }

    function createPagination() {
        paginationControls.innerHTML = '';

        // Add Previous button
        const prevButton = document.createElement('button');
        prevButton.textContent = '<';
        prevButton.id = 'prev-btn';
        prevButton.classList.add('btn', 'btn-secondary', 'm-1');
        prevButton.disabled = true; // Initially disabled
        prevButton.addEventListener('click', () => {
            if (currentPage > 1) showPage(currentPage - 1);
        });
        paginationControls.appendChild(prevButton);

        // Add page number buttons
        for (let i = 1; i <= totalPages; i++) {
            const button = document.createElement('button');
            button.textContent = i;
            button.classList.add('btn', 'btn-secondary', 'm-1', 'page-btn');
            button.addEventListener('click', () => showPage(i));
            paginationControls.appendChild(button);
        }

        // Add Next button
        const nextButton = document.createElement('button');
        nextButton.textContent = '>';
        nextButton.id = 'next-btn';
        nextButton.classList.add('btn', 'btn-secondary', 'm-1');
        nextButton.addEventListener('click', () => {
            if (currentPage < totalPages) showPage(currentPage + 1);
        });
        paginationControls.appendChild(nextButton);
    }

    // Initialize
    createPagination();
    showPage(1);
});

