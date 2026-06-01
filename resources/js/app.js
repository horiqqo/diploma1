import { initSlider } from './modules/slider';
import { initAccessible } from './modules/accessible';
import { initTheme } from './modules/theme';
import { initBurger } from './modules/burger';
import {confirmDelete} from "./modules/modal.js";

document.addEventListener('DOMContentLoaded', () => {
    initSlider();
    initTheme();
    initAccessible();
    initBurger();
});


