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

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-demo-form]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            let isValid = true;
            form.querySelectorAll('[required]').forEach((field) => {
                const error = field.parentElement.querySelector('[data-field-error]') || field.closest('fieldset')?.querySelector('[data-field-error]');
                const target = field.dataset.confirmPassword ? document.getElementById(field.dataset.confirmPassword) : null;
                const invalid = !field.value.trim() || (target && field.value !== target.value) || !field.checkValidity();
                field.classList.toggle('border-red-500', invalid);
                error?.classList.toggle('hidden', !invalid);
                isValid = isValid && !invalid;
            });
            const feedback = form.querySelector('[data-demo-feedback]');
            if (isValid && feedback) { feedback.textContent = 'Demo only: no account data has been sent.'; feedback.classList.remove('hidden'); }
        });
    });

    document.querySelectorAll('[data-otp-group]').forEach((group) => {
        const inputs = [...group.querySelectorAll('[data-otp-input]')];
        inputs.forEach((input, index) => {
            input.addEventListener('input', () => { input.value = input.value.replace(/\D/g, '').slice(0, 1); if (input.value && inputs[index + 1]) inputs[index + 1].focus(); });
            input.addEventListener('keydown', (event) => { if (event.key === 'Backspace' && !input.value && inputs[index - 1]) inputs[index - 1].focus(); });
        });
    });

    const password = document.querySelector('[data-password-strength]');
    if (password) password.addEventListener('input', () => {
        const score = password.value.length >= 10 && /[A-Z]/.test(password.value) && /\d/.test(password.value) ? 3 : password.value.length >= 6 ? 2 : password.value.length ? 1 : 0;
        const colors = ['', 'bg-red-500', 'bg-amber-500', 'bg-emerald-600'];
        document.querySelectorAll('[data-strength-bar]').forEach((bar, index) => { bar.className = `h-1.5 flex-1 ${index < score ? colors[score] : 'bg-slate-200'}`; });
        document.querySelector('[data-strength-label]').textContent = ['Password strength', 'Weak', 'Medium', 'Strong'][score];
    });

    const resend = document.querySelector('[data-resend-button]');
    if (resend) resend.addEventListener('click', () => { resend.textContent = 'Code resent (demo)'; });
});

document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.querySelector('[data-dashboard-sidebar]');
    const overlay = document.querySelector('[data-dashboard-overlay]');
    const toggle = document.querySelector('[data-dashboard-toggle]');
    const close = document.querySelector('[data-dashboard-close]');

    if (!sidebar || !overlay || !toggle) return;

    const setOpen = (open) => {
        sidebar.classList.toggle('-translate-x-full', !open);
        overlay.classList.toggle('hidden', !open);
        toggle.setAttribute('aria-expanded', String(open));
        document.body.classList.toggle('overflow-hidden', open);
    };

    toggle.addEventListener('click', () => setOpen(sidebar.classList.contains('-translate-x-full')));
    close?.addEventListener('click', () => setOpen(false));
    overlay.addEventListener('click', () => setOpen(false));
});

document.addEventListener('DOMContentLoaded', () => {
    const search = document.querySelector('[data-category-search-input]');
    const cards = [...document.querySelectorAll('[data-category-card]')];
    const empty = document.querySelector('[data-category-empty]');

    if (search && cards.length) {
        search.addEventListener('input', () => {
            const query = search.value.trim().toLowerCase();
            let matches = 0;
            cards.forEach((card) => {
                const visible = card.dataset.categorySearch.includes(query);
                card.classList.toggle('hidden', !visible);
                if (visible) matches += 1;
            });
            empty?.classList.toggle('hidden', matches !== 0);
        });
    }

    document.querySelectorAll('[data-category-toggle]').forEach((toggle) => {
        toggle.addEventListener('click', () => {
            const card = toggle.closest('[data-category-card]');
            const subcategories = card?.querySelector('[data-category-subcategories]');
            const chevron = toggle.querySelector('[data-category-chevron]');
            const expanded = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!expanded));
            subcategories?.classList.toggle('hidden', expanded);
            chevron?.classList.toggle('rotate-180', !expanded);
        });
    });
});
