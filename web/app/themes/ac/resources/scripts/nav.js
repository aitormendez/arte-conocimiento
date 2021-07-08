$(document).ready(() => {
  // Dirección scroll
  let
    w = $(window),
    viewportWidth = w.width(),
    lastY = w.scrollTop(),
    menuItems = $('.my-menu-item'),
    hamb = $('#hamb'),
    direction = '',
    currY = '';

    menuItems.each(function() {
      $(this).siblings().children('.my-child-menu').slideUp(0);
    });



  if (viewportWidth <= 1024) {
    console.log(menuItems);
    // acordeón móvil
    menuItems.click(function(){
      console.log(menuItems.index(this));
      $(this).children('.my-child-menu').slideDown();
      $(this).siblings().children('.my-child-menu').slideUp();
    });

    // botón hamburguesa
    if (direction) {

    }


  } else {

  }

  w.scroll(function() {
    currY = w.scrollTop(),
    direction = (currY > lastY) ? 'down' : 'up';
    lastY = currY;
    console.log(direction);
  });




});
