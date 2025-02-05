
$(document).ready(() => {


  quantityChange('.decrement', -1)
  quantityChange('.increment', 1)

  totalNetResult()

  // for testing
  skipStepTester()
})

function quantityChange(target, value) {
  $(target).click((ev) => {

    const target = ev.currentTarget;
    const quantity = $(target).siblings('#quantity');
    const price = $(target.closest('#row')).find('#price')
    const cost = $(target.closest('#row')).find('#cost');
    const amount = Number(quantity.val());
    const sub = amount > 0 ? amount + value: 0;
    const add = amount + value;

    quantity.val(value > 0 ? add : sub);
    cost.text('¥' + Number(quantity.val()) * Number(price.text().replace('$','')))
    totalNetResult();
  })

}

function totalNetResult() {
  
  const allPrice = $('#sample-table #cost');
  const total = $('main #total');
  let result = 0;

  for(i = 0; i < allPrice.length; i ++) {

    const value = $(allPrice[i]).text().replace('$', '');
    result += Number(value);
  }

  for(i = 0; i < total.length; i ++) {

    $(total[i]).text('¥' + result);
  }
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

