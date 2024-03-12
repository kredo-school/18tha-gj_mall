const handleItemClick = (prefix, itemNumber) => {
    const item = document.getElementById(`carousel-${prefix}-item-${itemNumber}`);
    item.classList.add('active');

    for (let i = 1; i <= 3; i++) {
        if (i !== itemNumber) {
            document.getElementById(`carousel-${prefix}-item-${i}`).classList.remove('active');
        }
    }
};

const addClickListener = (element, prefix, itemNumber) => {
    element.addEventListener('click', () => {
        handleItemClick(prefix, itemNumber);
    });
};

const recommendedItems = ['recommended', 'favorites'];

recommendedItems.forEach((prefix) => {
    for (let i = 1; i <= 3; i++) {
        const element = document.getElementById(`item-${prefix}-${i}`);
        addClickListener(element, prefix, i);
    }
});