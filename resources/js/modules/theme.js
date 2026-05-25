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

    const set = (sel, src) => { const el = document.querySelector(sel); if (el) el.src = src; };

    set('#btn-theme img',             `/images/icons/${d ? 'sun' : 'moon'}.svg`);
    set('#btn-theme-mobile img',      `/images/icons/${d ? 'sun' : 'moon'}.svg`);
    set('#btn-accessible img',        `/images/icons/eye${s}.svg`);
    set('#btn-accessible-mobile img', `/images/icons/eye${s}.svg`);
    set('#btn-profile img',           `/images/icons/profile${s}.svg`);
    set('#burger-icon',               `/images/icons/burger-menu${s}.svg`);
    set('#mobile-menu a img',         `/images/icons/profile${s}.svg`);
}
