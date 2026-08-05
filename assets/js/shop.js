(() => {
  'use strict';
  const open = document.querySelector('.ta-filter-toggle');
  const close = document.querySelector('.ta-filter-close');
  const sidebar = document.querySelector('.ta-shop-sidebar');
  if (!open || !sidebar) return;
  const setOpen = (state) => {
    document.body.classList.toggle('ta-filters-open', state);
    open.setAttribute('aria-expanded', String(state));
    if (state && close) close.focus();
  };
  open.addEventListener('click', () => setOpen(true));
  if (close) close.addEventListener('click', () => setOpen(false));
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') setOpen(false);
  });
  document.addEventListener('click', (event) => {
    if (document.body.classList.contains('ta-filters-open') && !sidebar.contains(event.target) && !open.contains(event.target)) setOpen(false);
  });
})();
