
// Checked/Unchecked button function
document.addEventListener('DOMContentLoaded', function() {

    const checkboxes = document.querySelectorAll('.item-checkbox'); 

    checkboxes.forEach(function(checkbox) { 
        checkbox.addEventListener('click', function() { 
            toggleCheckbox(this); 
            updateSubtotal();

        }); 
    }); 

    function toggleCheckbox(checkbox) {
        
        if (checkbox.classList.contains('checked')) { 
            
            checkbox.src = "../images/customer/uncheckedIcon.svg";
            checkbox.classList.remove('checked'); 

        } else { 
            
            checkbox.src = "../images/customer/checkedIcon.svg"; 
            checkbox.classList.add('checked'); 

        } 
    } 

    function updateSubtotal(checkbox) { 
        const cartItems = document.querySelectorAll('.cartItem-card'); 
        let subTotal = 0; 

        cartItems.forEach(function(item) { 
            const priceElement = item.querySelector('.product_price'); 
            const quantityElement = item.querySelector('#quantity'); 
            const price = parseFloat(priceElement.textContent); 
            const quantity = parseInt(quantityElement.value); 
            const itemSubTotal = price * quantity; 
            subTotal += itemSubTotal;
        });

        const subTotalElement = document.querySelector('.sub_total'); 
        subTotalElement.textContent = subTotal.toFixed(2); 
        updateTotal(subTotal); 
    } 

    function updateTotal() { 
        let total = 0; 
        checkboxes.forEach(function(checkbox) { 
            
            if (checkbox.classList.contains('checked')) { 
                const itemId = checkbox.getAttribute('data-item-id'); 
                
                const item = JSON.perse(document.getElementById('id', itemId).textContent); 
                total += item.price * item.qty; 
            }  
        }); 
        document.getElementById('total').textContent = total.toFixed(2);
    }
});

document.addEventListener('DOMContentLoaded', function() { 
    updatePrice();
    updateSubtotal(); 

    function updateSubtotal() { 
        const cartItems = document.querySelectorAll('.cartItem-card'); 
        let subTotal = 0; 

        cartItems.forEach(function(item) { 
            const priceElement = item.querySelector('.product_price'); 
            const quantityElement = item.querySelector('#quantity'); 
            const price = parseFloat(priceElement.textContent); 
            const quantity = parseInt(quantityElement.value); 
            const itemSubTotal = price * quantity; 
            subTotal += itemSubTotal; 
        }); 
        
        const subTotalElement = document.querySelector('.sub_total'); 
        subTotalElement.textContent = subTotal.toFixed(2); 
        updateTotal(subTotal); 
    } 
    
    function updateTotal(subTotal) { 
        const shippingPrice = parseFloat(document.querySelector('.shipping_price').textContent); 
        const total = subTotal + shippingPrice; 
        const totalElement = document.querySelector('.total_price'); 
        totalElement.textContent = total.toFixed(2); 
    } 

    function updatePrice() { 
        const cartItems = document.querySelectorAll('.cartItem-card'); 

        cartItems.forEach(function(item) {
            const priceElement = item.querySelector('.product_price'); 
            const quantityElement = item.querySelector('#quantity'); 
            const price = parseFloat(priceElement.textContent); 
            const quantity = parseInt(quantityElement.value); 
            const itemTotal = price * quantity; 

            const itemTotalElement = item.querySelector('#product_price'); 
            itemTotalElement.textContent = itemTotal.toFixed(2);
        }); 
    } 
    
    // Event listener for quantity changes
    const quantityInputs = document.querySelectorAll('#quantity'); 
    quantityInputs.forEach(function(input) { 
        input.addEventListener('change', function() { 
            updateSubtotal();
            updatePrice();
        }); 
    }); 

});

// Event listener for back button 
const backButton = document.getElementById('btn--back'); 
if (backButton) { 
    backButton.addEventListener('click', function() { 
        window.history.back(); 
    }); 
};