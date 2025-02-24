$(document).ready(() => {

  skipStepTester();
})

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