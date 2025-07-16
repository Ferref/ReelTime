import $ from 'jquery';

$(function () {
    const search = $('#search');
    const searchBox = $('#search-box');
    const filterBox =  $('#filter-box');
    const searchInput = $('#search-input');
    const movies = $('.card');

    search.on('click', function (e) {
    e.preventDefault();
    searchBox.fadeToggle(500).toggleClass('d-none');

    if(searchBox.hasClass('d-none')){
        filterBox.fadeOut();
    }
    });

    // searchInput.on('input', function () {
    //     const query  = $(this).val().toLowerCase();
    //     const results = movies.each(function () {
    //         const title = $(this).find('.card-title').text().toLowerCase();

    //         if (title.includes(query)) {
    //             $(this).removeClass('d-none');
    //         } else {
    //             $(this).addClass('d-none');
    //         }
    //     });
    // });
});
