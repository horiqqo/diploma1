export function initAccessible() {
    let level  = parseInt(localStorage.getItem('accessible-level')  || '0');
    let scheme = localStorage.getItem('accessible-scheme') || 'default';

    applyLevel(level);
    applyScheme(scheme);
    updateUI(level, scheme);

    document.getElementById('btn-accessible')?.addEventListener('click', e => {
        e.stopPropagation();
        document.getElementById('accessible-panel')?.classList.toggle('hidden');
    });

    document.addEventListener('click', e => {
        if (!e.target.closest('#accessible-wrapper')) {
            document.getElementById('accessible-panel')?.classList.add('hidden');
        }
    });

    document.querySelectorAll('.accessible-size-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            level = parseInt(btn.dataset.size);
            localStorage.setItem('accessible-level', level);
            applyLevel(level);
            updateUI(level, scheme);
        });
    });

    document.querySelectorAll('.accessible-scheme-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            scheme = btn.dataset.scheme;
            localStorage.setItem('accessible-scheme', scheme);
            applyScheme(scheme);
            updateUI(level, scheme);
        });
    });

    ['accessible-reset', 'accessible-reset-mobile'].forEach(id => {
        document.getElementById(id)?.addEventListener('click', () => {
            level = 0;
            scheme = 'default';
            localStorage.removeItem('accessible-level');
            localStorage.removeItem('accessible-scheme');
            applyLevel(0);
            applyScheme('default');
            updateUI(0, 'default');
        });
    });
}

function applyLevel(level) {
    const html = document.documentElement;
    html.classList.remove('accessible-1', 'accessible-2', 'accessible-3');
    if (level > 0) html.classList.add(`accessible-${level}`);
}

function applyScheme(scheme) {
    const html = document.documentElement;
    html.classList.remove('accessible-scheme-dark', 'accessible-scheme-yellow');

    if (scheme === 'dark') {
        html.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
    }

    if (scheme !== 'default') html.classList.add(`accessible-scheme-${scheme}`);
}

function updateUI(level, scheme) {
    document.querySelectorAll('.accessible-size-btn').forEach(btn => {
        const active = parseInt(btn.dataset.size) === level;
        btn.classList.toggle('btn-primary', active);
        btn.classList.toggle('btn-ghost',   !active);
    });

    document.querySelectorAll('.accessible-scheme-btn').forEach(btn => {
        const active = btn.dataset.scheme === scheme;
        btn.classList.toggle('ring-2',        active);
        btn.classList.toggle('ring-primary',  active);
        btn.classList.toggle('ring-offset-1', active);
    });
}
