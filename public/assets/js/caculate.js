
$(document).ready(() => {

    // for popup
    $(document).on('click', '#payment:has(#select-payment:checked) .btn-payment', () => {
        $('#warning-msg').hide();
        $('#payment .popup').fadeIn();
    });
    $(document).on('click', '#payment:has(#select-payment:not(:checked)) .btn-payment', () => {
        $('#warning-msg').show();
        const header = $('header').outerHeight() || 0;
        $('html, body').animate({
            scrollTop: $('#payment-check-sec').offset().top - (header + 30)
        }, 1000)
    });
    $('#payment #cancel').click((ev) => {
        ev.preventDefault();
        $('.popup').fadeOut();
    });

    // form input show
    $('#edit').click(() => {
        $('.address-detail').hide();
        $('.address-form').show();
    })

    $('#address #cancel').click(() => {
        $('.address-form').hide();
        $('.address-detail').show();
        $('#address input').val('');
        $('#address select').val($(''));
    })

    // price caculation
    quantityChange('.decrement', -1);
    quantityChange('.increment', 1);
    netTotal(true);
    netTotal();
})

function showPage(target) {
    $('.page').hide();
    $(target).show();
}

/**
 * This function updates the quantity of an item when a specified target button is clicked. It increments or decrements the quantity based on the provided value. After updating the quantity, it triggers additional functions to recalculate and set the price.
 * @param {string | jQuery selector} target The clickable element to attach the event handler.
 * @param {number} value The value by which the quantity is adjusted (can be positive or negative).
 */
function quantityChange(target, value) {
    $(target).click((ev) => {

        const target = ev.currentTarget;
        caculating(target);
        setPrice(target);
    })
}

// function for Price Change
function setPrice(target) {

    const sample = target.closest('.table-item');
    const getPrice = numList('.price');
    const getCost = numList('.cost');
    const getQuantity = numList('.quantity-value');
    const getTotal = numList('.total');
    const tables = $('.table-item');

    totalSum('.price', getPrice);
    totalSum('.cost', getCost);
    totalSum('.quantity-value', getQuantity);
    totalSum('.total', getTotal);
    netTotal();

    function numList(item) {
        const list = $(sample).find(item);
        const result = [];
        const state = item.includes('quantity') ? true : false;

        Array.from(list).forEach((i, index) => result[index] = state ? $(i).val() : $(i).text());

        return result;
    }

    function totalSum(item, array) {

        Array.from(tables).forEach((i) => {

            const target = $(i).find(item);
            const state = item.includes('quantity') ? true : false;

            for (i = 0; i < array.length; i++) {

                state ? $(target[i]).val(array[i]) : $(target[i]).text(array[i]);
            }
        })
    }
}

function caculating(target) {

    const container = target.closest('.table-row');
    const price = $(container).find('.price').text().replace('¥', '').replace(/,/g, '');
    const quantity = $(container).find('.quantity-value').val();
    const cost = $(container).find('.cost');
    const value = Number(price) * Number(quantity);
    cost.text(formatPriceJapanese(value));
}

function netTotal(addtion) {

    const table = $('.table-item');

    Array.from(table).forEach((i) => {

        const cost = $(i).find('.cost');
        const total = $(i).find('.total');
        const price = $(i).find('.price');
        const quantity = $(i).find('.quantity-value');
        let result = 0;

        for (i = 0; i < cost.length; i++) {

            const priceVal = $(price[i]).text().replace('¥', '').replace(/,/g, '');
            const quantityVal = $(quantity[i]).val();
            const price_value = Number(priceVal) * Number(quantityVal);
            if (addtion) $(cost[i]).text(formatPriceJapanese(price_value));

            result += Number($(cost[i]).text().replace('¥', '').replace(/,/g, ''));
        };

        total.text(formatPriceJapanese(result));
    })
}

function getStoreCount(cur, value) {

    const product_id = cur.data('id');

    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

    let product = cart.find(item => item.product_id === product_id);

    let quantity = product ? product.quantity : 0;
    quantity += value;

    quantity = Math.max(1, quantity);

    $(cur).siblings('.quantity-value').val(quantity);

    product.quantity = quantity;

    cart.push({
        product_id: product_id,
        quantity: quantity
    });

    sessionStorage.setItem('cart', JSON.stringify(cart));
}


