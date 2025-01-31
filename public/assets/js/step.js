$('document').ready(() => {

    // forward
    change_step('#checkout .btn-next', '#checkout');

    function change_step(trigger, from) {

        $(trigger).click((e)=> {
            e.preventDefault();

            const header = $('header').outerHeight() || 0;
            
            $(from).hide();
            $($(trigger).attr('href')).fadeIn();
    
            $('html, body').animate({

                scrollTop: $('main').offset().top - header
            },1000)
        })
    }

    $('#address .btn-next').click(()=> {

        $('#address').hide();
        $('#payment').fadeIn();
    })
    $('#payment .btn-next').click(()=> {

        $('#payment').hide();
        $('#complete').fadeIn();
    })

    //backward
    $('#payment .btn-back').click(()=> {

        $('#payment').hide();
        $('#address').fadeIn();
    })
    $('#address .btn-back').click(()=> {

        $('#address').hide();
        $('#checkout').fadeIn();
    })
})