$(document).ready(() => {
      // Dirección scroll
      let
      w = $(window),
      viewportWidth = w.width(),
      lastY = w.scrollTop();

    if (viewportWidth >= 1024) {

    } else {

    }

    w.scroll(function() {
      let
        currY = w.scrollTop(),
        direction = (currY > lastY) ? 'down' : 'up';
      lastY = currY;
      console.log(direction);
    });
});
