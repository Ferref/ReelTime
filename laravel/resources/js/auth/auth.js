import $ from 'jquery';

$(function () {
  $('form').on('submit', function (e) {
    e.preventDefault();

    const form = $(this);
    const data = form.serialize();
    const action = form.attr('action');
    const errorList = $('#errorList');
    const errorBox = $('#errorBox');

    errorList.empty();

    $.post(action, data)
      .done(function (response) {
        if (response.redirect) {
          window.location.href = response.redirect;
        }
      })
      .fail(function (jqXHR) {
        const errors = jqXHR.responseJSON?.errors;
        errorBox.removeClass('d-none');

        if(typeof errors === 'object' && errors !== null){
            for (const [key, value] of Object.entries(errors)) {
                errorList.append(`<li>${value}</li>`);
            };
        }
        else if (Array.isArray(errors)) {
          errors.forEach((error) => {
            errorList.append(`<li>${error}</li>`);
          });
        } else if (typeof errors === 'string') {
          errorList.append(`<li>${errors}</li>`);
        } else {
          errorList.append('<li>An unknown error occurred.</li>');
        }
      });
  });
});
