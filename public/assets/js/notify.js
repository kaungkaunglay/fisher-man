$(document).ready(() => {
  notiFx('.white-list');
  notiFx('.cart');
});

function notiFx(type) {
  $(type + '-btn').click(() => {

    const array = $(type + '-fx');
    const check = array.filter(function() {
      return $(this).hasClass('active');
    });

    // If there's no element with the 'active' class
    if (check.length === 0) {
      $(type + '-fx').addClass('active');
      setTimeout(() => {
        $(type + '-fx').removeClass('active');
      }, 2000);
    }
  });
}