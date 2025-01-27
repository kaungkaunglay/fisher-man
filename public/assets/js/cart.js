window.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.quanity').forEach((element) => {
        const decrementBtn = element.querySelector('#decrement');
        const incrementBtn = element.querySelector('#increment');
        const quantityInput = element.querySelector('#quantity');
    
        decrementBtn.addEventListener('click', () => {
            let value = parseInt(quantityInput.value) || 1;
            if (value > 1) {
                quantityInput.value = value - 1;
                update(element);
            }
        });
    
        incrementBtn.addEventListener('click', () => {
            let value = parseInt(quantityInput.value) || 1;
            quantityInput.value = value + 1;
            update(element);
        });
    });

    totalSum('.desktop');
    totalSum('.mobile');
})

function update(target) {
    const row = target.closest('#row');
    const price = Number(row.querySelector('#price').textContent.replace('$', ''));
    const quantity = Number(row.querySelector('#quantity').value);
    const cost = row.querySelector('#cost'); 

    cost.textContent = '$' + price * quantity;
    
    totalSum(target, '#table');
    stateCheck();
}

function totalSum (target, row) {
    const container = row ? target.closest(row): document.querySelector(target);
    const price = container.querySelectorAll('#cost');
    const total = container.querySelector('#total');
    let result = 0;

    for(i = 0; i < price.length; i ++) {

       result +=  Number(price[i].textContent.replace('$', ''));
    }

    total.textContent = '$' + result; 
}

function stateCheck() {

    const mobileState = window.getComputedStyle(document.querySelector('.mobile')).display;
    mobileState !== 'none' ? copyValues('.mobile','.desktop'): copyValues('.desktop','.mobile');
}

function copyValues(con1,con2) {
    const container1 = document.querySelector(con1);
    const container2 = document.querySelector(con2);
    const row = container2.querySelectorAll('#row');
    const total = container2.querySelector('#total');

    for (let i = 0; i < row.length; i++) {
        const price = container2.querySelectorAll('#cost')[i];
        const quanity = container2.querySelectorAll('#quantity')[i];

        price.textContent = container1.querySelectorAll('#cost')[i].textContent;
        quanity.value = container1.querySelectorAll('#quantity')[i].value;
        
    }
    total.textContent = container1.querySelector('#total').textContent;
}
