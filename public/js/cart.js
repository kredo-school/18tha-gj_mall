
document.addEventListener('DOMContentLoaded', function() { 
    
    const checkboxes = document.querySelectorAll('.item-checkbox'); 

    checkboxes.forEach(function(checkbox) { 
        checkbox.addEventListener('click', function() { 
            toggleCheckbox(this); 
            updateTotal(); 

        }); 
    }); 



    function toggleCheckbox(checkbox) {
        
        if (checkbox.classList.contains('checked')) { 
            
            checkbox.src = "../images/customer/uncheckedIcon.png";
            checkbox.classList.remove('checked'); 

        } else { 
            
            checkbox.src = "../images/customer/checkedIcon.png"; 
            checkbox.classList.add('checked'); 

        } 
    } 

    function updateTotal() { 

        let total = 0; 
        checkboxes.forEach(function(checkbox) { 
            
            if (checkbox.classList.contains('checked')) { 
                // const itemId = checkbox.getAttribute('data-item-id'); 
                
                // const item = @json($cartItems->where('id', itemId)->first()); 
                // total += item.price * item.quantity; 
            }  
        }); 
        // document.getElementById('total').textContent = total.toFixed(2);
    } 
});