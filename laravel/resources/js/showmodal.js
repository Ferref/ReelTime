import { Modal } from 'bootstrap';

document.addEventListener('DOMContentLoaded', () => {
  const modalEl = document.getElementById('messageModal');
  if (modalEl) {
    const modal = new Modal(modalEl);
    modal.show();
  }
});
