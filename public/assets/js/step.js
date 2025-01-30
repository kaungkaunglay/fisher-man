$('document').ready(() => {

    $('.checkout .btn-next').click(()=> {

        $('.checkout').hide()
        $('.address').show();
    })
    $('.address .btn-next').click(()=> {

        $('.checkout').show();
        $('.payment').show();
    })
})