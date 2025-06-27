import $ from 'jquery';

$(function() {
    $('#filter-box').hide();

    $('#filter-switch').on('click', function() {
        const $filterBox = $('#filter-box');
        $filterBox.stop(true, true).slideToggle(300);
    });
});
