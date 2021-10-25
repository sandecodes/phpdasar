const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');
const tombol = document.querySelector('.tombol-cari');

tombol.style.display = 'none';

keyword.addEventListener('keyup', function () {
  fetch('ajax/ajax_cari.php?keyword=' + keyword.value)
    .then((response) => response.text())
    .then((response) => (container.innerHTML = response));
});
