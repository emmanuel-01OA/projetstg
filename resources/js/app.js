import './bootstrap';
import 'flowbite';

function toggleModal() {
    const modal = document.getElementById('modal');
    modal.classList.toggle('hidden');
  }

  document.addEventListener('DOMContentLoaded', () => {
    window.toggleModal = toggleModal;
  });

  document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('readProductButton').click();
  });
