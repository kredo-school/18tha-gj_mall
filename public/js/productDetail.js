var buttonPlus  = $(".qty-btn-plus");
var buttonMinus = $(".qty-btn-minus");

buttonPlus.click(function() {
    var $n = $(this).parent(".qty-container").find(".input-qty");
    $n.val(Number($n.val())+1 );
});

buttonMinus.click(function() {
    var $n = $(this).parent(".qty-container").find(".input-qty");

    var amount = Number($n.val());
        if (amount > 0) {
            $n.val(amount-1);
        }
});