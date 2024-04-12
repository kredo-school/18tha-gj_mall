var buttonPlus  = $(".qty-btn-plus");
var buttonMinus = $(".qty-btn-minus");

buttonPlus.click(function() {
    var $n = $(this).parent(".qty-container").find(".input-qty");
    var currentValue = Number($n.val());
    
    if (currentValue < 5) {
        $n.val(currentValue + 1);
    } else {
        alert("Maximum quantity reached");
    }
});

buttonMinus.click(function() {
    var $n = $(this).parent(".qty-container").find(".input-qty");

    var amount = Number($n.val());
        if (amount > 0) {
            $n.val(amount-1);
        }
});