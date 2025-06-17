import $ from 'jquery';

$(function () {
    $('#switch-btn').on('click', function () {
        $('#registration').fadeToggle().toggleClass('d-none');
        $('#login').fadeToggle().toggleClass('d-none');
        if (!$('#errorBox').hasClass('d-none')) {
            $('#errorBox').addClass('d-none');
        }
    });
});
