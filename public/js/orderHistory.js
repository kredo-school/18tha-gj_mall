$(document).ready(function() {
    var deleteButtonClicked = false;

    $('.ratings i').click(function() {        
        if (!deleteButtonClicked) {
            $(this).toggleClass('text-warning');
            $(this).prevAll('i').addClass('text-warning');
            $(this).nextAll('i').removeClass('text-warning');
        }
    });

    $('.delete-button').click(function() {
        deleteButtonClicked = true;
    });

    $('.edit-button, .normal-button').click(function() {
        deleteButtonClicked = false;
    });
});