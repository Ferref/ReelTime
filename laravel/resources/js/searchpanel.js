import $ from 'jquery';

$(function () {
    const search = $('#search');
    const searchBox = $('#search-box');
    const searchInput = $('#search-input');
    const moviesData = JSON.parse($('#movies-data').val()).results;
    const movieSuggestions = $('#movie-suggestions');

    search.on('click', function (e) {
    e.preventDefault();
    searchBox.fadeToggle(500).toggleClass('d-none');
    });

    searchInput.on('input', function () {
        movieSuggestions.empty();
        const query  = $(this).val().toLowerCase();
        const matches = moviesData.filter(movie => movie.title.toLowerCase().includes(query));

        matches.forEach(movie => {
            movieSuggestions.append(`<option value="${movie.title}">`);
        })
    });
});
