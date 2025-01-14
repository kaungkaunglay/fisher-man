document.querySelectorAll('.quanity').forEach((element) => {
    const decrementBtn = element.querySelector('#decrement');
    const incrementBtn = element.querySelector('#increment');
    const quantityInput = element.querySelector('#quantity');

    decrementBtn.addEventListener('click', () => {
        let value = parseInt(quantityInput.value) || 1;
        if (value > 1) {
            quantityInput.value = value - 1;
            updateTotal();
        }
    });

    incrementBtn.addEventListener('click', () => {
        let value = parseInt(quantityInput.value) || 1;
        quantityInput.value = value + 1;
        updateTotal();
    });
});

function updateTotal() {
    let total = 0;
    document.querySelectorAll('tbody tr').forEach((row) => {
        const price = parseFloat(row.querySelector('td:nth-child(4)').innerText.replace('$', '')) || 0;
        const quantity = parseInt(row.querySelector('#quantity').value) || 1;
        row.querySelector('td:nth-child(6)').innerText = `$${price * quantity}`;
        total += price * quantity;
    });
    document.querySelector('tfoot td:nth-child(2)').innerText = `$${total}`;
}