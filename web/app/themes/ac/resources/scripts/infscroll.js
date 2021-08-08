const InfiniteScroll = require('infinite-scroll');

$(document).ready(() => {
  if (document.body.classList.contains('archive')) {

    let main = new InfiniteScroll( '.infinite-scroll-container', {
      path: '.nav-previous a',
      append: '.infinite-scroll-item',
      history: false,
      hideNav: '.nav-links',
      // button: '.view-more-button',
      // status: '.page-load-status',
    });


  }
});
