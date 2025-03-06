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

    input.forEach(i => {
        const output = $(`output[for="${$(i).attr('id')}"]`);
        const phone = output.text().trim();
        const extension = phone.slice(0, 3);
        const number = phone.slice(3);

        $(i).closest('div').find('select').each(function () {
            if ($(this).val() === extension) {
                $(this).prop('selected', true);
            } else {
                $(this).prop('selected', false);
            }
        });

        $(i).val(number);
    });


    textarea.forEach(i => {

        $(i).val($(`output[for="${$(i).attr('id')}"]`).text());
    })

}

function unactiveForm(cur) {
    cur.removeClass('active');
    if ($('.sec-phone').val() == '') $('.cor').hide();
    else $('.cor').show();
}

function checkIfChange() {

}

// start image preview
let previewImage = function (input, outputSelector) {
    const output = $(outputSelector);

    // Clear previous preview
    output.empty();

    if (input.files && input.files.length > 0) {
        const file = input.files[0]; // Only take the first file

        // Check if file is an image
        if (file.type.match('image.*')) {
            const fileReader = new FileReader();

            fileReader.onload = function (e) {
                const img = $('<img>', {
                    src: e.target.result,
                    class: 'preview-image',
                    alt: 'Preview',
                    css: {
                        // Add some styles to the image
                    }
                });
                output.append(img);
            };

            fileReader.onerror = function (e) {
                console.error('Error reading file:', e);
            };

            fileReader.readAsDataURL(file);
        } else {
            // Show default image if file isn't an image
            output.find('img.default-preview').removeClass("d-none");
        }
    } else {
        // Show default image when no file selected
        output.find('img.default-preview').removeClass("d-none");
    }
}

// Event listener with error handling
$("#avatar-input").on('change', function () {
    try {
        previewImage(this, ".gallery");
    } catch (error) {
        console.error('Preview error:', error);
    }
});
// end image preview

