import $ from 'jquery';

$(function() {
    const filterBox = $('#filter-box');
    const btnClose = $('.btn-close');
    const filterSwitch = $('#filter-switch');
    const fastSearchPanel = $('#fast-search-panel');
    const footer = $('#footer');

    filterSwitch.on('click', function() {
        filterBox.toggleClass('d-none', filterBox.fadeToggle());
        fastSearchPanel.toggleClass('d-none');
        footer.slideToggle();
    });

    btnClose.on('click', function() {
        filterBox.fadeOut(500, 'linear', () => filterBox.addClass('d-none'));
        fastSearchPanel.removeClass('d-none');
        footer.slideToggle();
    })
});
