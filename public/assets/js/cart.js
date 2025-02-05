
$(document).ready(() => {

  quantityChange('.decrement', -1);
  quantityChange('.increment', 1);
  netTotal(true);
  netTotal();

  // for testing
  // skipStepTester();
})

function quantityChange(target, value) {
  $(target).click((ev) => {

    const target = ev.currentTarget;
    const quanity = $(target).siblings('.quantity-value');
    const amount = Number(quanity.val());

    // for only sepcific quantity value;
    const sub = amount > 0 ? amount + value: 0;
    const add = amount + value;

    quanity.val(value > 0 ? add : sub);
    caculating(target);
    setPrice(target);
  })
}

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
    const state = item.includes('quantity') ? true: false;

    Array.from(list).forEach( (i,index) => result[index] = state ? $(i).val(): $(i).text());

    return result;
  }

  function totalSum(item,array) {

    Array.from(tables).forEach( (i) => {

      const target = $(i).find(item);
      const state = item.includes('quantity') ? true: false;

      for(i = 0; i < array.length; i ++) {

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
  
  Array.from(table).forEach( (i) => {
    
    const cost = $(i).find('.cost');
    const total = $(i).find('.total');
    const price = $(i).find('.price');
    const quantity = $(i).find('.quantity-value');
    let result = 0;
    
    for(i = 0; i < cost.length; i ++) {
      
      const priceVal = $(price[i]).text().replace(currencyUnit(), '');
      const quantityVal = $(quantity[i]).val();

      if(addtion) $(cost[i]).text( currencyUnit() + Number(priceVal) * Number(quantityVal));

      result += Number($(cost[i]).text().replace(currencyUnit(), ''));
    };

    total.text(currencyUnit() + result);
  })
}

function currencyUnit() {

  return $('.price').first().text()[0];
}

// func for testing
function skipStepTester() {

  $('.step:nth-child(1)').click(() => goStep('#checkout'));
  $('.step:nth-child(3)').click(() => goStep('#address'));
  $('.step:nth-child(4)').click(() => goStep('#payment'));
  $('.step:nth-child(5)').click(() => goStep('#complete'));

  function goStep($target) {
    $('.page').hide();
    $($target).show();
  }
}

