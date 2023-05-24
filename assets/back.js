/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)

import './styles/app-back.scss';
// start the Stimulus application
import { Tooltip, Toast, Popover } from 'bootstrap';
import './theme/colorAdmin/admin/scss/material/styles.scss';
import 'jquery-ui-dist/jquery-ui.js';
import PerfectScrollbar from 'perfect-scrollbar';
window.PerfectScrollbar = PerfectScrollbar;
import '../node_modules/jquery-menu-aim';
import './theme/colorAdmin/admin/js/app.min.js';

