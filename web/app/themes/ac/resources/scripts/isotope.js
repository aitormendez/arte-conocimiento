let Isotope = require('isotope-layout');
let imagesLoaded = require('imagesloaded');
require('isotope-packery');
let viewportWidth = $(window).width();

if (document.body.classList.contains('home') && viewportWidth > 1024 ) {
    let grid = document.querySelector('#destacados');

    var iso = new Isotope( grid, {
        layoutMode: 'packery',
        itemSelector: 'article',
        percentPosition: true,
    });
    
    imagesLoaded( grid ).on( 'progress', function() {
        // layout Isotope after each image loads
        iso.layout();
    });
}


document.querySelectorAll('#button-group button').forEach((item, i) => {
    item.addEventListener('click', event => {
        let filtro = item.getAttribute('data-filter');
        console.log(filtro);
        iso.arrange({
            filter: filtro,
          });


    })
});


