const btnMenu = document.querySelector('.bx-menu');
const btnClose = document.querySelector('.bx-x');
const div = document.querySelector('.menu-button');

btnMenu.addEventListener('click', () => {
  div.classList.remove('hidden');
  btnClose.classList.remove('hidden');
  btnMenu.classList.add('hidden');
});

btnClose.addEventListener('click', () => {
  div.classList.add('hidden');
  btnClose.classList.add('hidden');
  btnMenu.classList.remove('hidden');
});
