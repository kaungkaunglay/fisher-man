$('document').ready(() => {

    // track id code to show page
    const page = $(location).attr('href');
    if(page.includes('#address')) $('#address').show();
    else if(page.includes('#payment')) $('#payment').show();
    else if(page.includes('#complete')) $('#complete').show();
    else $('#checkout').show();

    // forward
    change_step('#checkout .btn-next');
    change_step('#address .btn-next');
    change_step('#payment .btn-next');

    //backward
    change_step('#payment .btn-back');
    change_step('#address .btn-back');
    change_step('#checkout .btn-back');
    
    // for popup 
    const warningText = 'Why you forgot to check! hmm why?';

    $(document).on('click', '#payment:has(#select-payment:checked) .btn-payment', () => {
        $('#warning-msg').hide();
        $('#payment .popup').fadeIn();
    });
    $(document).on('click', '#payment:has(#select-payment:not(:checked)) .btn-payment', () => {
        $('#warning-msg').show();
        const header = $('header').outerHeight() || 0; 
        $('html, body').animate({
            scrollTop: $('#payment-check-sec').offset().top - (header + 30)
        },1000)
    });
    $('#cancel').click((ev)=> {
        ev.preventDefault();
        $('.popup').fadeOut();
    });

    
    /**
     * Handles navigation between steps in a multi-step form or checkout process. It supports both forward (btn-next) and backward (btn-back) navigation.
     * @param {string|jQuery} trigger The button that triggers the step change (e.g., .btn-next, .btn-back).
     */
    function change_step(trigger) {

        $(trigger).click((ev)=> {
            ev.preventDefault();

            const header = $('header').outerHeight() || 0; 
            const dir = ev.currentTarget.classList.contains('btn-next') ? true: false; //true for forward dir & false for backward dir
            const index = ($('.page').index(ev.currentTarget.closest('.page')));

            if(dir) {
                for(i = 1; i <= index + 2; i++) {
                    $($('.step')[i]).addClass('active');
                }
            }else {
                for(i = 4; i > index - (index == '1' ? 1 : 0) ; i--) {
                    $($('.step')[i]).removeClass('active');
                }
            }
            console.log(index);

            $($(trigger).closest('.page')).hide();
            $($(trigger).attr('href')).fadeIn();
    
            $('html, body').animate({

                scrollTop: $('main').offset().top - header
            },1000)
        })
    }
})