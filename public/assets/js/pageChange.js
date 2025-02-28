$(document).ready(() =>{

  PageChange();
})

function PageChange() {

  $('[data-page]').click((ev) => {

    const trigger = ev.currentTarget;
    const curPage = trigger.closest('.page');
    const getPage = $(trigger).attr('data-page');
    const header = $('header').outerHeight() || 0;
    
    $(curPage).hide();
    $(getPage).show();
    $('html, body').animate({
      
      scrollTop: $('main').offset().top - header
    }, 500);

    stepChange(getPage);
    progress(getPage);
    ev.preventDefault();
  })

}

function stepChange(page) {
  const step = $(page).attr('data-step');
  
  for(let i = 0;i < step; i ++) $($('.step-list .step')[i]).addClass('active');
}

function progress(page) {
  const progress = $('.progress-2');
  const value = $(page).attr('data-step');

  console.log(value)
}