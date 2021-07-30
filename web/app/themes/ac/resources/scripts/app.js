/**
 * External Dependencies
 */
import 'jquery';
// import './three.js';
import './nav.js';
import './isotope.js';
import './gsap.js';
import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { 
  faFilePdf, 
  faFile , 
  faFileAlt, 
  faFileArchive,
  faFileWord,
  faFileExcel,
  faFilePowerpoint,
} from '@fortawesome/free-solid-svg-icons';

library.add(faFilePdf, faFile, faFileAlt, faFileArchive, faFileWord, faFileExcel, faFilePowerpoint);
dom.watch();


$(document).ready(() => {
  document.documentElement.style.setProperty('--scrollbar-width', (window.innerWidth - document.documentElement.clientWidth) + "px");
});



// window.addEventListener('resize', ()=> console.log(document.documentElement.clientWidth));