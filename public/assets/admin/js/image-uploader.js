document.addEventListener('DOMContentLoaded', function() {
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');
    const previewContainer = document.getElementById('previewContainer');
    const progressBar = document.querySelector('.progress-bar');
    const progress = document.querySelector('.progress');
    const uploadForm = document.getElementById('uploadForm');
    
    // Files storage
    let files = [];
    
    // Click to browse files
    dropZone.addEventListener('click', function() {
        fileInput.click();
    });
    
    // Handle file select
    fileInput.addEventListener('change', function() {
        handleFiles(this.files);
    });
    
    // Drag and drop functionality
    dropZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropZone.classList.add('dragover');
    });
    
    dropZone.addEventListener('dragleave', function() {
        dropZone.classList.remove('dragover');
    });
    
    dropZone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropZone.classList.remove('dragover');
        
        if (e.dataTransfer.files.length) {
            handleFiles(e.dataTransfer.files);
        }
    });
    
    // Handle the selected files
    function handleFiles(selectedFiles) {
        // Add newly selected files to our collection
        for (const file of selectedFiles) {
            if (file.type.startsWith('image/')) {
                files.push(file);
            }
        }
        
        // Reset file input
        fileInput.value = '';
        
        // Update previews
        updatePreviews();
        
        // Show simulated progress
        simulateUpload();
    }
    
    // Update image previews
    function updatePreviews() {
        previewContainer.innerHTML = '';
        
        files.forEach((file, index) => {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const previewElement = document.createElement('div');
                previewElement.className = 'image-preview';
                
                previewElement.innerHTML = `
                    <img src="${e.target.result}" alt="Preview">
                    <button type="button" class="remove-btn" data-index="${index}">×</button>
                `;
                
                previewContainer.appendChild(previewElement);
            };
            
            reader.readAsDataURL(file);
        });
    }
    
    // Remove image
    previewContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-btn')) {
            const index = parseInt(e.target.getAttribute('data-index'));
            files.splice(index, 1);
            updatePreviews();
        }
    });
    
    // Simulate upload progress
    function simulateUpload() {
        if (files.length > 0) {
            progress.style.display = 'flex';
            let width = 0;
            
            const interval = setInterval(() => {
                if (width >= 100) {
                    clearInterval(interval);
                    setTimeout(() => {
                        showSuccess();
                    }, 500);
                } else {
                    width += 5;
                    progressBar.style.width = width + '%';
                    progressBar.setAttribute('aria-valuenow', width);
                }
            }, 100);
        }
    }
    
    // Show success message
    function showSuccess() {
        // In a real application, you would handle the actual file upload here
        progress.style.display = 'none';
        
        // Create success alert
        const successAlert = document.createElement('div');
        successAlert.className = 'alert alert-success mt-3';
        successAlert.textContent = `Successfully uploaded ${files.length} image${files.length > 1 ? 's' : ''}!`;
        
        // Insert before preview container
        uploadForm.insertAdjacentElement('afterend', successAlert);
        
        // Remove after 3 seconds
        setTimeout(() => {
            successAlert.remove();
        }, 3000);
    }
    
    // Form submission
    uploadForm.addEventListener('submit', function(e) {
        e.preventDefault();
        // In a real application, you would handle the actual file upload to server here
    });
});