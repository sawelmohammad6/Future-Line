import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const menuButton = document.querySelector('[data-mobile-menu-button]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    if (!menuButton || !mobileMenu) return;

    menuButton.addEventListener('click', () => {
        const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
        menuButton.setAttribute('aria-expanded', String(!isOpen));
        mobileMenu.classList.toggle('hidden', isOpen);
    });
});
