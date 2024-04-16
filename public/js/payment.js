document.getElementById('is_gift').addEventListener('change', function(e) {
    var isChecked           = e.target.checked;
    var giftBox             = document.getElementById('gift_box'); 
    var totalAmountElement  = document.getElementById('total_amout').querySelector('span');
    var subtotalElement     = document.getElementById('sub_total');

    // Updated Gift Box 
    giftBox.classList.toggle('d-none', !isChecked);
    
    // calculation 
    var subtotal     = parseFloat(subtotalElement.textContent);
    var shippingCost = 10; // This valu is fixed
    var giftBoxCost  = isChecked ? 5 : 0; // This valu is fixed - $5 or $0
    var totalAmount  = subtotal + shippingCost + giftBoxCost;

    // // Update total amount display
    totalAmountElement.textContent = totalAmount.toFixed(2);
});

document.getElementById('confirm').addEventListener('click', function() {
    let total = 0;
    const totalElement = document.querySelector('.total_price');
    if (totalElement) {
        total = totalElement.textContent;
    }
});