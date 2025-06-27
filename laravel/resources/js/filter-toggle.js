import $ from 'jquery';

$(function() {
    $('#filter-box').hide();
    $('#filter-box').removeClass('d-none');

    $('#filter-switch').on('click', function() {
        const $filterBox = $('#filter-box');
        $filterBox.stop(true, true).slideToggle(300);
    });
});
