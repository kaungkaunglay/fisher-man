$(document).ready(() => {

    $('.edit').click((ev) => {
        ev.preventDefault();
        actionForm(ev, true);
    })

    $('.cancel').click((ev) => {
        ev.preventDefault();
        actionForm(ev)
        unactiveForm(ev.currentTarget);
        resetData(ev);
    })

    if ($('.sec-phone').val() == '') $('.cor').hide();
    else $('.cor').show();

});

function actionForm(trig, action) {

    const trigger = trig.currentTarget;
    const form = trigger.closest('.profile-form');
    const input = form.querySelectorAll('input:not(.checkbox-list input):not([type="file"])');
    const selectbox = form.querySelectorAll('select');
    const textarea = form.querySelectorAll('textarea');
    const output = form.querySelectorAll('output');
    const btn = form.querySelectorAll('button');
    const img = form.querySelector('.avatar-upload');

    if (action) {
        $(input).attr('disabled', false);
        $(selectbox).attr('disabled', false);
        $(textarea).attr('disabled', false);
        $(form.querySelector('input[type="file"]')).attr('disabled', false);
    } else {
        $(input).attr('disabled', true);
        $(selectbox).attr('disabled', true);
        $(textarea).attr('disabled', true);
        $(form.querySelector('input[type="file"]')).attr('disabled', true);
    }
    $(output).toggleClass('d-none');
    $(input).toggleClass('d-none');
    $(selectbox).toggleClass('d-none');
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
        const selectbox = $($('#' + $(i).attr('for') + "_extension"));
        $(i).text($(selectbox).val() + $(input).val());
    })
}

function resetData(trig) {
    const trigger = trig.currentTarget;
    const form = trigger.closest('.profile-form');
    const input = form.querySelectorAll('input');
    const textarea = form.querySelectorAll('textarea');
    const errors = form.querySelectorAll('span.invalid-feedback');


    input.forEach(i => {
        const output = $(`output[for="${$(i).attr('id')}"]`);
        const val = output.text().trim();
        const number = val.slice(3);

        if ($(i).attr('id').includes('phone')) {
            $(i).val(number);
            $(`#${$(i).attr('id')}_extension`).val('+81');    
        } else {
            $(i).val(val);
        }

    });


    textarea.forEach(i => {

        $(i).val($(`output[for="${$(i).attr('id')}"]`).text());
    })

    errors.forEach(i => {
        $(i).text('');
    })

}

function unactiveForm(cur) {
    $(cur).removeClass('active');
    if ($('.sec-phone').val() == '') $('.cor').hide();
    else $('.cor').show();
}

function checkIfChange() {

}



