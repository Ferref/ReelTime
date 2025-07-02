import $ from 'jquery';

$(function() {
    const filterBox = $('#filter-box');
    const btnClose = $('.btn-close');
    const filterSwitch = $('#filter-switch');
    const fastSearchPanel = $('#fast-search-panel');
    const footer = $('#footer');

    filterBox.hide();
    filterBox.removeClass('d-none');

    filterSwitch.on('click', function() {
        filterBox.stop(true, true).slideToggle(300);
        fastSearchPanel.toggleClass('d-none');
        footer.slideToggle();
    });

    btnClose.on('click', function() {
        filterBox.fadeOut();
        fastSearchPanel.removeClass('d-none');
    })
});
