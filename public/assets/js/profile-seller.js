$(document).ready(() => {

  $('.edit').click((ev) => {
    ev.preventDefault();
    $($(ev.currentTarget.closest('.profile-form'))).addClass('active');
    $('.profile-form input').attr('readonly', false);
  })

  $('.cancel').click((ev) => {
    ev.preventDefault();
    $($(ev.currentTarget.closest('.profile-form'))).removeClass('active');
    $('.profile-form input').attr('readonly', true);
    if($('.sec-phone').val() == '') $('.cor').hide();
    else $('.cor').show();
  })

  if($('.sec-phone').val() == '') $('.cor').hide();
  else $('.cor').show();
})