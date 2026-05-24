export function initSlider() {
    let currentText = 0;
    const textSlides = document.querySelectorAll('.slide-text');
    const textDots = document.querySelectorAll('.text-dot');

    window.goToText = function(index) {
        textSlides[currentText].classList.remove('opacity-100', 'scale-100');
        textSlides[currentText].classList.add('opacity-0', 'scale-90');
        currentText = index;
        textSlides[currentText].classList.remove('opacity-0', 'scale-90');
        textSlides[currentText].classList.add('opacity-100', 'scale-100');
        textDots.forEach((dot, i) => {
            dot.classList.toggle('bg-primary', i === currentText);
            dot.classList.toggle('bg-base-300', i !== currentText);
        });
    }
}
