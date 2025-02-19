// Wait for the page to load
window.addEventListener('load', function() {
    // Get DOM elements
    const progressBar = document.getElementById('progress-bar');
    const preloader = document.getElementById('preloader');
    const mainContent = document.getElementById('main-content');
    
    // Initialize progress
    let progress = 0;
    
    // Simulate loading progress
    const interval = setInterval(function() {
        // Increment progress
        progress += 5;
        
        // Update progress bar width
        progressBar.style.width = progress + '%';
        
        // Check if loading is complete
        if (progress >= 100) {
            // Clear the interval
            clearInterval(interval);
            
            // Add fade-out class to preloader
            preloader.classList.add('fade-out');
            
            // After animation completes, hide preloader and show main content
            setTimeout(function() {
                preloader.style.display = 'none';
                mainContent.style.display = 'block';
            }, 500);
        }
    }, 100);
});

// Optional: Function to manually show preloader
function showPreloader() {
    const preloader = document.getElementById('preloader');
    const mainContent = document.getElementById('main-content');
    
    preloader.classList.remove('fade-out');
    preloader.style.display = 'flex';
    mainContent.style.display = 'none';
}

// Optional: Function to manually hide preloader
function hidePreloader() {
    const preloader = document.getElementById('preloader');
    const mainContent = document.getElementById('main-content');
    
    preloader.classList.add('fade-out');
    setTimeout(function() {
        preloader.style.display = 'none';
        mainContent.style.display = 'block';
    }, 500);
}