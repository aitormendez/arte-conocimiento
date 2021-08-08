/**
 * External Dependencies
 */
import 'jquery';
// import './three.js';
import './nav.js';
import './isotope.js';
import './colores.js';
import './post.js';
import './infscroll.js';
import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { 
  faFilePdf, 
  faFile , 
  faFileAlt, 
  faFileArchive,
  faFileWord,
  faFileExcel,
  faFilePowerpoint,
  faAngleRight,
} from '@fortawesome/free-solid-svg-icons';

library.add(faFilePdf, faFile, faFileAlt, faFileArchive, faFileWord, faFileExcel, faFilePowerpoint, faAngleRight);
dom.watch();


$(document).ready(() => {
  document.documentElement.style.setProperty('--scrollbar-width', (window.innerWidth - document.documentElement.clientWidth) + "px");
});



// window.addEventListener('resize', ()=> console.log(document.documentElement.clientWidth));