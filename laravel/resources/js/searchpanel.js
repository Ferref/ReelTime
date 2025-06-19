import $ from 'jquery';

$(function () {
  const search = $('#search');
  const searchInput = $('#search-input');

  search.on('click', function (e) {
    e.preventDefault();
    searchInput.fadeToggle(500).toggleClass('d-none');
  });
});
