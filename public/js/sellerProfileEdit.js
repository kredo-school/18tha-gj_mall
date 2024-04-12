function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#category-img-tag').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#cat_image").change(function(){
    readURL(this);
});
