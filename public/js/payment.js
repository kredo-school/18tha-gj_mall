document.addEventListener('DOMContentLoaded', function() {
    var totalAmountElement  = document.getElementById('total_amount').querySelector('span');
    var subtotalElement     = document.getElementById('sub_total');
    var shippingCostElement = document.getElementById('shipping_cost');
    var isChecked           = document.getElementById('is_gift').checked;

    // calculation 
    var subtotal     = parseFloat(subtotalElement.textContent);
    var shippingCost = parseFloat(shippingCostElement.textContent);
    var giftBoxCost  = isChecked ? 5 : 0; // This valu is fixed - $5 or $0
    var totalAmount  = subtotal + shippingCost + giftBoxCost;

    // Update total amount display
    totalAmountElement.textContent = totalAmount.toFixed(2);
});

document.getElementById('is_gift').addEventListener('change', function(e) {
    var isChecked           = e.target.checked;
    var giftBox             = document.getElementById('gift_box'); 
    var totalAmountElement  = document.getElementById('total_amount').querySelector('span');
    var subtotalElement     = document.getElementById('sub_total');
    var shippingCostElement = document.getElementById('shipping_cost');

    // Updated Gift Box 
    giftBox.classList.toggle('d-none', !isChecked);
    
    // calculation 
    var subtotal     = parseFloat(subtotalElement.textContent);
    var shippingCost = parseFloat(shippingCostElement.textContent);
    var giftBoxCost  = isChecked ? 5 : 0; // This valu is fixed - $5 or $0
    var totalAmount  = subtotal + shippingCost + giftBoxCost;

    // // Update total amount display
    totalAmountElement.textContent = totalAmount.toFixed(2);
});

document.getElementById('confirm').addEventListener('click', function() {
    let total = 0;
    var totalAmountElement = document.getElementById('total_amount').querySelector('span');
    var totalAmount  = parseFloat(totalAmountElement.textContent);

    if (totalAmount) {
        total = totalAmount.toFixed(2);
    }

    $.ajaxSetup({ 
        headers: { 
            'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") 
        }
    })

    $.ajax({
        type: 'POST',
        url: '/customer/payment/transaction/confirmation',
        data: JSON.stringify({
            total: total,
            checkedItemIds: checkedItemIds
        }),
        contentType: 'application/json', 
        success: function (response) {
            console.log(response);
           window.location.href = response.redirectUrl;
        },
        error: function(xhr, status, error) {
            console.error('XHR Status:', status);
            console.error('Error:', error);
            console.error('XHR Response:', xhr.responseText);
        }
    });
});