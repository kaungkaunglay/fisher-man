window.addEventListener('load', function() {
    // Fade out the preloader
    document.querySelector('.preloader').style.opacity = 0;
    document.querySelector('.preloader').style.transition = 'opacity 1s ease';

    // Wait for the fade-out transition to complete
    setTimeout(function() {
        // Hide the preloader and show the main content
        document.querySelector('.preloader').style.display = 'none';
        document.querySelector('.main-content').style.display = 'block';

        // Fade in the main content
        setTimeout(function() {
            document.querySelector('.main-content').style.opacity = 1;
            document.querySelector('.main-content').style.transition = 'opacity 0.5s ease';
        }, 50);
    }, 1000); // Duration of the fade-out transition
});