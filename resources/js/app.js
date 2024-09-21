import './bootstrap';
import 'flowbite';
import Chart from 'chart.js/auto';
import $ from 'jquery';



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
