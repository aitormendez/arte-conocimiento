import {
 gsap
} from 'gsap/all';

$(document).ready(() => {

    let viewportWidth = window.innerWidth;

    if (document.body.classList.contains('home') && viewportWidth > 1024 )  {
        // añadir clase colores en '.arriba' del destacado cuadrado imagen
        // añadir clase colores en '.abajo' del destacado cuadrado texto
    
        document.querySelectorAll('article.cuadrado.imagen .arriba, article.cuadrado.texto .abajo').forEach((item, i) => {
            item.classList.add('colores');
        });
    
        // eliminar clase colores en '.meta' del destacado cuadrado
    
        document.querySelectorAll('article.cuadrado .meta').forEach((item, i) => {
            item.classList.remove('colores');
        });
    }
    
    if (viewportWidth > 1024 ) {
    // animación degradados enlaces que no son '.normal'
    
        document.querySelectorAll('#app a:not(.normal)').forEach((item, i) => {
            item.addEventListener('mouseenter', event => {
                item.id = 'color-enlace-' + i;
                gsap.set('#color-enlace-' + i, {
                    backgroundImage: 'radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(255, 245, 0, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%)',
                })
                window['c' + 1] = gsap.to('#color-enlace-' + i, {
                    duration: '0.5',
                    backgroundImage: 'radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(255, 245, 0, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%)',
                    repeat: -1,
                    repeatRefresh: true,
                    ease: "sine.inOut",
                });
            })
            item.addEventListener('mouseleave', event => {
                gsap.set('#color-enlace-' + i, {
                    backgroundImage: 'none',
                })
                window['c' + 1].kill();
                // gsap.killTweensOf('#color-enlace-' + i);
            })
        })
    
    
        // animar elementos con la clase '.colores' EN HOVER
        
        document.querySelectorAll('.colores').forEach((item, i) => {
            item.addEventListener('mouseenter', event => {
                item.id = 'color-' + i;
                gsap.set('#color-' + i, {
                    backgroundImage: 'radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(255, 245, 0, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%)',
                })
                gsap.to('#color-' + i, {
                    duration: '1',
                    backgroundImage: 'radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(255, 245, 0, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%)',
                    repeat: -1,
                    repeatRefresh: true,
                    ease: "sine.inOut",
                });
            })
            item.addEventListener('mouseleave', event => {
                gsap.killTweensOf('#color-' + i);
            })
        })
    }
    
    // animar elementos con la clase '.color-ya' INMEDIATAMENTE
    
    document.querySelectorAll('.color-ya').forEach((item, i) => {
        item.id = 'colorya-' + i;
        gsap.set('#colorya-' + i, {
            backgroundImage: 'radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(255, 245, 0, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%)',
        })
        gsap.to('#colorya-' + i, {
            duration: '1',
            backgroundImage: 'radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(255, 245, 0, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%)',
            repeat: -1,
            repeatRefresh: true,
            ease: "sine.inOut",
        });
    })
      
});
  
