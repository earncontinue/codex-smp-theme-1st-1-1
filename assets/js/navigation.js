(function () {
  const button = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.main-navigation');

  if (!button || !nav) {
    return;
  }

  button.addEventListener('click', function () {
    const expanded = button.getAttribute('aria-expanded') === 'true';
    button.setAttribute('aria-expanded', expanded ? 'false' : 'true');
    nav.classList.toggle('toggled');
  });
})();
