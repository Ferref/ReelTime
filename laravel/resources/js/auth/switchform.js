import $ from 'jquery';

// Switch form
$(function () {
    $('#switch-btn').on('click', function () {
        $('#registration').fadeToggle().toggleClass('d-none');
        $('#login').fadeToggle().toggleClass('d-none');
    });
});
