
document.addEventListener('DOMContentLoaded', function() {
    //Step 1: Get all the cart card elements
    const cartItems = document.querySelectorAll('.cartItem-card');

    //For each cart element, listen if it was "changed", if its checked then add the value, if its not then subtract
    cartItems.forEach(function(item) { 
        const checkbox = item.querySelector('.item-checkbox'); 
        const syncCheckbox = item.querySelector('.sync-checkbox'); // Check box for synchronization.
        checkbox.addEventListener('click', function() { 
            toggleCheckbox(this, syncCheckbox);
        }); 
    }); 

    function toggleCheckbox(checkbox, syncCheckbox) { 

        if (checkbox.classList.contains('checked')) { 
            checkbox.src = "../images/customer/uncheckedIcon.svg";
            checkbox.classList.remove('checked');
            syncCheckbox.checked = false;
        } else { 
            checkbox.src = "../images/customer/checkedIcon.svg"; 
            checkbox.classList.add('checked');
            syncCheckbox.checked = true;
        } 
        updateSubtotal();  
    } 

    function updateSubtotal() { 
        //Fetcha ll cards
        const cartItems = document.querySelectorAll('.cartItem-card'); 
        let subTotal = 0; 

        //Compute which ones are checked or not
        cartItems.forEach(function(_item) { 
            const checkbox = _item.querySelector('.item-checkbox');
            if (checkbox.classList.contains('checked')) {
                const priceElement = _item.querySelector('.product_price'); 
                const quantityElement = _item.querySelector('.quantity'); 
                const price = parseFloat(priceElement.textContent); 
                const quantity = parseInt(quantityElement.value); 
                const itemSubTotal = price * quantity; 
                subTotal += itemSubTotal;
            }
        });

        const subTotalElement = document.querySelector('.sub_total'); 
        if (subTotalElement) {
            subTotalElement.textContent = subTotal.toFixed(2);
        }
        updateTotal(subTotal);
    } 

    function updateTotal(subTotal) { 
       const shippingPriceElement = document.querySelector('.shipping_price');
        const shippingPrice = parseFloat(shippingPriceElement.textContent);
        const total = subTotal + shippingPrice;

        const totalElement = document.querySelector('.total_price');
        if (totalElement) {
            totalElement.textContent = total.toFixed(2);
        }
    }
});


// Quantity calculator
document.addEventListener('DOMContentLoaded', function() { 
    //Step 1: Get all cart cards
    const cartItems = document.querySelectorAll('.cartItem-card');

    //Step 2: Add listeners for each quanitity input fields
    cartItems.forEach(function(item) {
        const quantityInput = item.querySelector('.quantity');
        quantityInput.addEventListener('change', function() {
            //For each quantity input, whenever its changed, fire updatePrice(item)
            updatePrice(item);
        });
    });
    updateSubtotal(); 

    //Updates subtotal based on the quantity per item
    function updateSubtotal() { 
        let subTotal = 0; 

        cartItems.forEach(function(item) { 
            const priceElement = item.querySelector('.product_price');
            const quantityElement = item.querySelector('.quantity');

            const price = parseFloat(priceElement.textContent);
            const quantity = parseInt(quantityElement.value);
            subTotal += price * quantity;
        }); 
        
       const subtotalElement = document.querySelector('.sub_total');
        if (subtotalElement) {
            subtotalElement.textContent = subTotal.toFixed(2);
        }

        updateTotal(subTotal);
    } 
    
    //Updates total price based on the quantity per item
    function updateTotal(subTotal) { 
        const shippingPriceElement = document.querySelector('.shipping_price');
        const shippingPrice = parseFloat(shippingPriceElement.textContent);
        const total = subTotal + shippingPrice;

        const totalElement = document.querySelector('.total_price');
        if (totalElement) {
            totalElement.textContent = total.toFixed(2);
        }
    } 

    //Updates individual price based on the quantity per item
    function updatePrice(item) {  
        // Find the elements related to price and quantity within the same cart item card
        const priceElement = item.querySelector('.product_price'); // Gets element
        const quantityElement = item.querySelector('.quantity'); // Gets element

        const pricePerItem = parseFloat(priceElement.textContent); // Gets the text
        const quantity = parseInt(quantityElement.value); // Gets the value
        const totalItemPrice = pricePerItem * quantity; 

        // Get the new element for total price * quantity and apply changes.
        const totalPriceElement = item.querySelector('.total_price_for_item');
        if (totalPriceElement) {
            totalPriceElement.textContent = totalItemPrice.toFixed(2);
        }

        updateSubtotal();
    } 

});

// Event listener for back button 
const backButton = document.getElementById('btn--back'); 
if (backButton) { 
    backButton.addEventListener('click', function() { 
        window.location.href = document.referrer;
    }); 
};

// Check if total is eual to 0 or not: total 0 => button disabled
document.addEventListener('DOMContentLoaded', function() {
    const checkoutButton  = document.getElementById('checkoutButton');
    const subTotalElement = document.querySelector('.sub_total'); 
    const cartItems       = document.querySelectorAll('.cartItem-card'); 
    
    function updateCheckoutButtonState() {
        const total = parseFloat(subTotalElement.innerText); 
        checkoutButton.disabled = (total === 0);
    }

    updateCheckoutButtonState();

    cartItems.forEach(function(item) {
        const checkbox = item.querySelector('.item-checkbox');
        checkbox.addEventListener('click', function() {
            updateCheckoutButtonState();
        });
    });
});