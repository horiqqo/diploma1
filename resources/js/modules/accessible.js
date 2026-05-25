export function initAccessible() {
    let level = parseInt(localStorage.getItem('accessible-level') || '0');
    applyLevel(level);

    ['btn-accessible', 'btn-accessible-mobile'].forEach(id => {
        const btn = document.getElementById(id);
        if (!btn) return;

        btn.addEventListener('click', () => {
            level = (level + 1) % 4;
            localStorage.setItem('accessible-level', level);
            applyLevel(level);
        });
    });
}

function applyLevel(level) {
    const html = document.documentElement;
    html.classList.remove('accessible-1', 'accessible-2', 'accessible-3');
    if (level > 0) {
        html.classList.add(`accessible-${level}`);
    }
}
