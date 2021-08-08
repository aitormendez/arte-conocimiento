const InfiniteScroll = require('infinite-scroll');

$(document).ready(() => {
  if (document.body.classList.contains('archive')) {

    let viewMoreButton = document.querySelector('.view-more-button');

    let infScroll = new InfiniteScroll( '.infinite-scroll-container', {
      path: '.nav-previous a',
      append: '.infinite-scroll-item',
      history: false,
      hideNav: '.nav-links',
      button: '.view-more-button',
      status: '.page-load-status',
    });

    infScroll.on( 'load', onPageLoad );

    function onPageLoad() {
    if ( infScroll.loadCount == 1 ) {
        // after 2nd page loaded
        // disable loading on scroll
        infScroll.options.loadOnScroll = false;
        // show button
        viewMoreButton.style.display = 'inline-block';
        // remove event listener
        infScroll.off( onPageLoad );
    }
    }


  }
});
