$(document).ready(function() {
    var deleteButtonClicked = false;

    $('.ratings i').click(function() {
        if (!deleteButtonClicked) {
            var clickedValue = $(this).attr('data-value'); 
            $('.ratings i').removeClass('text-warning');
            $(this).addClass('text-warning');
            $(this).prevAll('i').addClass('text-warning');

            // Update the hidden input field with the clicked value
            $('#rating').val(clickedValue);
        }
    });

    // Event handler for delete button click
    $('.delete-button').click(function() {
        deleteButtonClicked = true;
    });

    // Event handler for edit button or normal button click
    $('.edit-button, .normal-button').click(function() {
        deleteButtonClicked = false;
    });
});

// Pass the selected data-value to the input field (#rating) using JavaScrip
document.addEventListener("DOMContentLoaded", function() {
    const stars = document.querySelectorAll('.ratings i');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            const ratingValue = this.getAttribute('data-value');
            const ratingInput = document.getElementById('rating');
            
            // Set the value of the hidden input field
            ratingInput.value = ratingValue;

            // Optional: Highlight selected stars (if needed)
            stars.forEach(s => {
                s.classList.remove('selected');
            });
            this.classList.add('selected');
        });
    });
});