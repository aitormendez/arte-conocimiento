import {
  gsap, random
} from 'gsap/all';

$(document).ready(() => {

    let viewportWidth = window.innerWidth;


  if (document.body.classList.contains('archive') && viewportWidth > 1024) {
    
    document.querySelectorAll('.thumb').forEach((item, i) => {
        item.id = 'giro-' + i;

        gsap.set('#giro-' + i, {
            rotation: 'random(-10, 10)',
        })

        item.addEventListener('mouseenter', event => {
            gsap.to('#giro-' + i, {
                duration: '0.5',
                rotation: 'random(340, 380)',
                ease: "power1.inOut",
            });
            gsap.to('#giro-' + i, {
                duration: '0.5',
                maxWidth: '50vw',
                ease: "power1.inOut",
            });
        })
        item.addEventListener('mouseleave', event => {
            gsap.to('#giro-' + i, {
                duration: '0.5',
                rotation: 'random(-20, 20)',
                ease: "power1.inOut",
            });
            gsap.to('#giro-' + i, {
                duration: '0.5',
                maxWidth: '10vw',
                ease: "power1.inOut",
            });
        })
        
    });


  }

});
