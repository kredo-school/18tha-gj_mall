document.getElementById('card_number').addEventListener('input', function (e) {
    var target            = e.target;
    var input             = target.value.replace(/\D/g, '').substring(0, 16);
    var formattedInput    = input.replace(/(.{4})/g, '$1 ').trim(); 
        
    target.value = formattedInput;
    displayCardLogo(getCardType(formattedInput));
});

function getCardType(cardNumber) {
    var cardTypes = {
        'visa': /^4/,
        'mastercard': /^5[1-5]/,
        'amex': /^3[47]/,
        'discover': /^6(?:011|5)/,
        'jcb': /^(?:2131|1800|35)/,
    };

    for (var type in cardTypes) {
        if (cardTypes[type].test(cardNumber)) {
            return type;
        }
    }

    return 'unknown';
}

function displayCardLogo(cardType) {
    var cardLogo = document.getElementById('card_logo');
    cardLogo.innerHTML = '';

    if (cardType !== 'unknown') {
        var icon = document.createElement('i');
        icon.className = 'fa-brands fa-cc-' + cardType;
        cardLogo.appendChild(icon);
    } 
}