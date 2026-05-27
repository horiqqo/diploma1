export function initTheme() {
    const saved = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', saved);
    updateIcons(saved);

    ['btn-theme', 'btn-theme-mobile'].forEach(id => {
        document.getElementById(id)?.addEventListener('click', () => {
            const next = document.documentElement.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', next);
            localStorage.setItem('theme', next);
            updateIcons(next);
        });
    });
}

function updateIcons(theme) {
    const d = theme === 'dark';
    const s = d ? '-white' : '';

    const themeIcon = d ? 'sun' : 'moon';
    document.querySelectorAll('[data-icon="theme"]').forEach(el => {
        el.src = `/images/icons/${themeIcon}.svg`;
    });

    document.querySelectorAll('[data-icon]:not([data-icon="theme"])').forEach(el => {
        const name = el.dataset.icon;
        el.src = `/images/icons/${name}${s}.svg`;
    });

    document.querySelectorAll('[data-illustration]').forEach(el => {
        const name = el.dataset.illustration;
        el.src = `/images/illustration/${name}${s}.webp`;
    });
}
