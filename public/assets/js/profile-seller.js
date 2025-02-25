$(document).ready(() => {

  $('.edit').click((ev) => {
    ev.preventDefault();
    actionForm(ev, true)
  })

  $('.cancel').click((ev) => {
    ev.preventDefault();
    actionForm(ev)
    unactiveForm(ev.currentTarget);
    resetData(ev)
  })


  $('.save').click((ev) => {
    // ev.preventDefault();
    actionForm(ev)
    unactiveForm(ev.currentTarget);
    updateData(ev);
  })

  if($('.sec-phone').val() == '') $('.cor').hide();
  else $('.cor').show();

});

function actionForm(trig, action) {

  const trigger = trig.currentTarget;
  const form = trigger.closest('.profile-form');
  const input = form.querySelectorAll('input:not(.checkbox-list input)');
  const textarea = form.querySelectorAll('textarea');
  const output = form.querySelectorAll('output');
  const btn = form.querySelectorAll('button');
  const img = form.querySelector('.avatar-upload');

  if(action) {
    $(input).attr('disabled', false);
    $(textarea).attr('disabled', false);

  }else {
    $(input).attr('disabled', true);
    $(textarea).attr('disabled', true);
  }
  $(output).toggleClass('d-none');
  $(input).toggleClass($(this).attr('type') != 'image' ? 'd-none': $(this).text(null));
  $(textarea).toggleClass('d-none');
  $(btn).toggleClass('d-none');
  $(img).toggleClass('d-none'); 
}

function updateData(trig) {
  const trigger = trig.currentTarget;
  const form = trigger.closest('.profile-form');
  const output = form.querySelectorAll('output');

  output.forEach(i => {

    const input = $($('#' + $(i).attr('for')));
    $(i).text($(input).val());
  })
}

function resetData(trig) {
  const trigger = trig.currentTarget;
  const form = trigger.closest('.profile-form');
  const input = form.querySelectorAll('input');
  const textarea = form.querySelectorAll('textarea');

  input.forEach(i => {

    $(i).val($(`output[for="${$(i).attr('id')}"]`).text());
  })

  textarea.forEach(i => {

    $(i).val($(`output[for="${$(i).attr('id')}"]`).text());
  })

}

function unactiveForm(cur) {

    $($(cur.closest('.profile-form'))).removeClass('active');
}



