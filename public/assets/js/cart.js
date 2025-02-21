
$(document).ready(() => {

    document.body.getClientRects()
    console.log($('.price').first())

    // track id code to show page
    const page = $(location).attr('href');
    if (page.includes('#address')) showPage('#address');
    else if (page.includes('#payment')) showPage('#payment');
    else if (page.includes('#complete')) showPage('#complete');
    else showPage('#checkout');

    // forward

    change_step('#checkout .btn-next', 2);
    change_step('#login .btn-next', 2);
    change_step('#address .btn-next', 3);
    change_step('#payment .btn-next', 4);

    //backward
    change_step('#payment .btn-back', 2);
    change_step('#address .btn-back', 0);
    change_step('#login .btn-back', 2);
    change_step('#checkout .btn-back');

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

    // remove Item

    // for testing
    skipStepTester();
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
        const quanity = $(target).siblings('.quantity-value');
        const amount = Number(quanity.val());

        // for only sepcific quantity value;
        const sub = amount > 1 ? amount + value : 1;
        const add = amount + value;

        quanity.val(value >= 1 ? add : sub);
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
    const price = $(container).find('.price').text().replace(currencyUnit(), '');
    const quantity = $(container).find('.quantity-value').val();
    const cost = $(container).find('.cost');

    cost.text(currencyUnit() + Number(price) * Number(quantity));
}

function netTotal(addtion) {

    const table = $('.table-item');

    console.log(Array.from(table).length);



    Array.from(table).forEach((i) => {

        const cost = $(i).find('.cost');
        const total = $(i).find('.total');
        const price = $(i).find('.price');
        const quantity = $(i).find('.quantity-value');
        let result = 0;

        for (i = 0; i < cost.length; i++) {

            const priceVal = $(price[i]).text().replace(currencyUnit(), '');
            const quantityVal = $(quantity[i]).val();

            if (addtion) $(cost[i]).text(currencyUnit() + Number(priceVal) * Number(quantityVal));

            result += Number($(cost[i]).text().replace(currencyUnit(), ''));
        };

        total.text(currencyUnit() + result);
    })
}

function currencyUnit() {
    const value = $('.table-item .price').first().text()[0];
    const result = value ? value : '';

    return result;
}

// func for testing
function skipStepTester() {

    $('.step:nth-child(1)').click(() => goStep('#checkout'));
    $('.step:nth-child(2)').click(() => goStep('#login'));
    $('.step:nth-child(3)').click(() => goStep('#address'));
    $('.step:nth-child(4)').click(() => goStep('#payment'));
    $('.step:nth-child(5)').click(() => goStep('#complete'));

    function goStep($target) {
        $('.page').hide();
        $($target).show();
    }
}

// step chaging function
// function change_step(trigger, point) {

//     $(trigger).click((ev) => {
//         ev.preventDefault();

//         const header = $('header').outerHeight() || 0;
//         const dir = ev.currentTarget.classList.contains('btn-next') ? true : false; //true for forward dir & false for backward dir
//         const index = ($('.page').index(ev.currentTarget.closest('.page')));
//         const progress = document.querySelector('.progress');

//         //
//         if (dir) {
//             for (i = 1; i <= index + 1; i++) {
//             for (i = 1; i <= index + 1; i++) {
//                 $($('.step')[i]).addClass('active');
//             }
//         }else {
//             for (i = 4; i > index - (index == '1' ? 1 : 0); i--) {
//                 $($('.step')[i]).removeClass('active');
//             }
//         }

//         console.log($(trigger).attr('href'));

//         progress.style.width = `calc((100% / 4) * ${point}`

//         $($(trigger).closest('.page')).hide();
//         $($(trigger).attr('href')).fadeIn();

//         $('html, body').animate({

//             scrollTop: $('main').offset().top - header
//         }, 500);
//     })
// }

function cleartotalPrice() {
   if($('.cost').length <= 0 ) $('.total').text(0);
}