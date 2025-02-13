$(document).ready(() => {

  $('.edit').click((ev) => {
    ev.preventDefault();
    $($(ev.currentTarget.closest('.profile-form'))).addClass('active');
    $('.profile-form.active input').attr('readonly', false);
  })

  $('.cancel').click((ev) => {
    ev.preventDefault();
    $($(ev.currentTarget.closest('.profile-form'))).removeClass('active');
    $('.profile-form.active input').attr('readonly', true);
  })

  console.log('work')
})