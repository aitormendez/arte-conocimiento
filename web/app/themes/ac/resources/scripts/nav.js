import {
  gsap, Power3, random
} from 'gsap/all';
 
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

    /* 
    * Animación hamburguesa y solapa abatible movil
    */

    gsap.set(hamb, {top: '1rem'})

    let h = $('.h');
    let solapa = $('.solapa');
    let hambObj = {
      estado: 'cerrado',
      estadoVertical: 'visible',
      abrir: function(){
        this.estado = 'abierto';
        hambDesintegrar.invalidate();
        hambDesintegrar.restart();
        hambFlotar.pause();
        abrirSolapa.restart();
        menuItemsStagger.restart();
      },
      cerrar: function(){
        this.estado = 'cerrado';
        hambDesintegrar.reverse();
        hambFlotar.play();
        abrirSolapa.reverse();
      },
      mostrar: function() {
        hambMostrar.restart();
        this.estadoVertical = 'visible';
        hambFlotar.play();
      },
      ocultar: function() {
        hambOcultar.restart();
        hambFlotar.pause();
        this.estadoVertical = 'oculto';
      }
    }

    let hambFlotar = gsap.to( h, {
      duration: '1',
      y: 'random(-5, 5)',
      rotate: 'random(-5, 5)',
      repeat: -1,
      ease: "sine.inOut",
      repeatRefresh: true,
    });

    let hambDesintegrar = gsap.to( h, {
      duration: '0.5',
      rotate: 'random(-500, 500)',
      x: 'random(-5, 5)',
      y: 'random(-5, 5)',
      paused:true,
      ease: 'Power3.out',
    });

    let abrirSolapa = gsap.to( solapa, {
      left: 0,
      paused:true,
    })

    let menuItemsStagger = gsap.from( menuItems, {
      duration: '1',
      x: '50%',
      ease: 'elastic.out',
      stagger: {
          each: 0.1,
      }
    })

    let hambMostrar = gsap.fromTo( hamb, {
      top: '-100px',
    }, {
      top: '1rem',
      duration: '1',
      ease: 'elastic.out',
    })

    let hambOcultar = gsap.to( hamb, {
      top: '-100px',
      duration: '1',
      paused: true,
    })

    hamb.click(function() {
      if (hambObj.estado == 'cerrado') {
          hambObj.abrir();    
      } else if (hambObj.estado == 'abierto') {
          hambObj.cerrar(); 
      }
    })

    w.scroll(function() {
      currY = w.scrollTop(),
      direction = (currY > lastY) ? 'down' : 'up';
      lastY = currY;
      console.log(direction);
      console.log(hambObj.estadoVertical);
  
      if (direction == 'down' && hambObj.estadoVertical == 'visible') {
        hambObj.ocultar();
      } else if (direction == 'up'  && hambObj.estadoVertical == 'oculto') {
        hambObj.mostrar();
      }
    });

  }



});
