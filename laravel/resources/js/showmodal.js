import $ from 'jquery';
import { Modal } from 'bootstrap';

$(function() {
  const modalEl = document.getElementById('messageModal');
  if (!modalEl) return;

  const modal = new Modal(modalEl);
  const $modalTitle = $(modalEl).find('.modal-title');
  const $modalBody = $(modalEl).find('.modal-body p');

  function showModal(title, message) {
    $modalTitle.text(title);
    $modalBody.text(message);
    modal.show();
  }

  $('.messageTrigger').on('click', function(e) {
    e.preventDefault();

    const $form = $(this).closest('form');
    const action = $form.attr('action');
    const data = $form.serialize();

    $.ajax({
      url: action,
      method: 'POST',
      data,
      success(response) {
        const title = response.title || 'Success';
        const message = response.message || response.body || 'Operation completed.';
        showModal(title, message);
      },
      error() {
        showModal('Error', 'Something went wrong.');
      }
    });
  });
});

