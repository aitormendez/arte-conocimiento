let Isotope = require('isotope-layout');
let imagesLoaded = require('imagesloaded');
require('isotope-packery');

if (document.body.classList.contains('home')) {
    let grid = document.querySelector('#destacados');

    var iso = new Isotope( grid, {
        layoutMode: 'packery',
        itemSelector: 'article',
        percentPosition: true,
    });
    
    imagesLoaded( grid ).on( 'progress', function() {
        // layout Isotope after each image loads
        iso.layout();
        console.log('a');
    });
}

