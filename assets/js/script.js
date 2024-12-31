document.querySelectorAll('.phone1 .dropdown-item').forEach(item => {
    item.addEventListener('click', function() {
        var countryCode = this.getAttribute('data-code');
        var countryFlag = this.getAttribute('data-country');
        document.getElementById('selected-flag1').src = 'https://kapowaz.github.io/square-flags/flags/' + countryFlag + '.svg';
        document.getElementById('phone-number1').value = countryCode;
    });
});

document.querySelectorAll('.phone2 .dropdown-item').forEach(item => {
    item.addEventListener('click', function() {
        var countryCode = this.getAttribute('data-code');
        var countryFlag = this.getAttribute('data-country');
        document.getElementById('selected-flag2').src = 'https://kapowaz.github.io/square-flags/flags/' + countryFlag + '.svg';
        document.getElementById('phone-number2').value = countryCode;
    });
});