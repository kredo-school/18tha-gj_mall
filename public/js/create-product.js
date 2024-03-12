// JavaScript to change background color of textarea
// https://chat.openai.com/share/44f2600f-eba8-44f0-9a01-c040a7d74976
var textarea = document.getElementById("description");

textarea.addEventListener("input", function() {
  var value = textarea.value.trim(); // Trim any whitespace

  if (value !== "") {
    textarea.style.backgroundColor = "#f2f2f2"; // Change background color when value is present
  } else {
    textarea.style.backgroundColor = "#fff"; // Revert to default background color if value is empty
  }
});



// JavaScript to change background color of  select form
// https://chat.openai.com/share/f8805f1e-0e59-4523-acbe-396caadfea51
$(document).ready(function() {
    $('#category').change(function() {
      $('option').addClass('selected');
      $(this).find('option:selected').removeClass('selected');
    });
  });



// JavaScript to change background color of checkbox
// https://chat.openai.com/share/1b641b9c-6ada-46bb-8669-e35641c6564a
const checkbox = document.getElementById('is_fragile');
const content = document.querySelector('.content');

checkbox.addEventListener('change', function() {
  if (this.checked) {
    content.classList.add('checked');
  } else {
    content.classList.remove('checked');
  }
});
