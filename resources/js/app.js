import { initSlider } from './modules/slider';
import { initAccessible } from './modules/accessible';
import { initTheme } from './modules/theme';
import { initBurger } from './modules/burger';

document.addEventListener('DOMContentLoaded', () => {
    initSlider();
    initTheme();
    initAccessible();
    initBurger();

});


