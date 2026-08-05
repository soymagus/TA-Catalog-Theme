(() => {
  'use strict';
  const header = document.querySelector('.site-header');
  const toggle = document.querySelector('.ta-menu-toggle');
  if (!header || !toggle) return;
  const closeMenu = () => {
    header.classList.remove('ta-nav-open');
    document.body.classList.remove('ta-menu-open');
    toggle.setAttribute('aria-expanded', 'false');
  };
  toggle.addEventListener('click', () => {
    const isOpen = header.classList.toggle('ta-nav-open');
    document.body.classList.toggle('ta-menu-open', isOpen);
    toggle.setAttribute('aria-expanded', String(isOpen));
  });
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') closeMenu();
  });
  window.addEventListener('resize', () => {
    if (window.innerWidth > 820) closeMenu();
  });
})();
