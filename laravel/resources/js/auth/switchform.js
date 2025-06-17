import $ from 'jquery';

$(function () {
    $('#switch-btn').on('click', function () {
        $('#registration').fadeToggle().toggleClass('d-none');
        $('#login').fadeToggle().toggleClass('d-none');
        $('#star').toggleClass('star-loaded');
        if (!$('#errorBox').hasClass('d-none')) {
            $('#errorBox').addClass('d-none');
        }
    });
});
