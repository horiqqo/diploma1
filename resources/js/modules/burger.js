export function initBurger() {
    const btn = document.getElementById('btn-burger');
    const btnClose = document.getElementById('btn-close');
    const menu = document.getElementById('mobile-menu');

    if (!btn || !menu) return;

    btn.addEventListener('click', () => {
        menu.classList.remove('hidden');
        menu.classList.add('flex');
        requestAnimationFrame(() => {
            menu.classList.add('opacity-100', 'translate-x-0');
            menu.classList.remove('opacity-0', 'translate-x-full');
        });
    });

    btnClose.addEventListener('click', () => {
        menu.classList.add('opacity-0', 'translate-x-full');
        menu.classList.remove('opacity-100', 'translate-x-0');
        setTimeout(() => {
            menu.classList.add('hidden');
            menu.classList.remove('flex');
        }, 300);
    });
}
