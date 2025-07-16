import $ from 'jquery';
import { Collapse } from 'bootstrap';

$(function () {
    const filterBox = $('#filter-box');
    const btnClose = $('.btn-custom-close');
    const filterSwitch = $('#filter-switch');
    const fastSearchPanel = $('#fast-search-panel');
    const footer = $('#footer');
    const navbarNav = $('#navbarNav');
    const mainContainer = $('.main-container');
    const navParent = $('nav');
    const body = $('body');

    function showFilterBox(isSmall) {
        if(isSmall){
            navParent.hide();
        }

        body.css('overflow', 'hidden');
        filterBox.removeClass('d-none').hide().fadeIn(300);
        fastSearchPanel.addClass('d-none');
        footer.slideUp(300);
        console.log('show')
    }

    function hideFilterBox(isSmall) {
        if(isSmall){
            navParent.show();
        }

        body.css('overflow', 'visible');
        filterBox.fadeOut(300, () => {
            filterBox.addClass('d-none');
            fastSearchPanel.removeClass('d-none');
            footer.slideDown(300);
        });

        console.log('hide')
    }

    filterSwitch.on('click', function () {
        const isSmall = window.innerWidth < 768;
        const filterHidden = filterBox.hasClass('d-none');
        console.log(isSmall)

        if (isSmall && filterHidden && navbarNav.hasClass('show')) {
            const navCollapse = Collapse.getOrCreateInstance(navbarNav[0]);
            navCollapse.hide();
            navbarNav.one('hidden.bs.collapse', showFilterBox);
        }
        
        filterHidden ? showFilterBox(isSmall) : hideFilterBox(isSmall);
    });

    btnClose.on('click', hideFilterBox);
});
