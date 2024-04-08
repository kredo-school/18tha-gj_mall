document.getElementById('avatar').addEventListener('change', function() {
    const file = this.files[0]; // Get the selected file
    if (file) {
        const reader = new FileReader(); // Create a FileReader object
        reader.onload = function(e) {
            try {
                const imgPreview = document.getElementById('avatarPreview');
                if (imgPreview) {
                    imgPreview.src = e.target.result; // Set the src attribute of the <img>
                } else {
                    console.error('Image preview element not found');
                }
            } catch (error) {
                console.error('Error loading image:', error);
            }
        };
        // Read the file as a data URL (base64 encoding)
        reader.readAsDataURL(file);
    }
});

    