import {
  gsap, random
} from 'gsap/all';

$(document).ready(() => {

    let viewportWidth = window.innerWidth;


  if (document.body.classList.contains('archive') || document.body.classList.contains('search') && viewportWidth > 1024) {
    
    document.querySelectorAll('.thumb').forEach((item, i) => {
        item.id = 'giro-' + i;
        let cambiando = false;

        function start() {
            cambiando = true;
        }

        function complete() {
            cambiando = false;
        }

        gsap.set('#giro-' + i, {
            rotation: 'random(-10, 10)',
        })

        function abrirRotar(){
            gsap.to('#giro-' + i, {
                duration: '0.5',
                rotation: 'random(340, 380)',
                ease: "power1.inOut",
                overwrite: 'auto',
            });
        } 

        function abrirCrecer() {
            gsap.to('#giro-' + i, {
                duration: '0.5',
                maxWidth: '50vw',
                ease: "power1.inOut",
                overwrite: 'auto',
                onStart: () =>  start(),
                onComplete: () =>  complete(),
            });
        }

        function cerrarRotar() {
            gsap.to('#giro-' + i, {
                duration: '0.5',
                rotation: 'random(-20, 20)',
                ease: "power1.inOut",
                overwrite: 'auto',
            });
        } 

        function cerrarCrecer() {
            gsap.to('#giro-' + i, {
                duration: '0.5',
                maxWidth: '15vw',
                ease: "power1.inOut",
                onStart: () =>  start(),
                onComplete: () =>  complete(),
                overwrite: 'auto',
            });
        } 

        item.addEventListener('mouseenter', event => {

            if (!cambiando) {
                abrirRotar();
                abrirCrecer();
            }

        })
        item.addEventListener('mouseleave', event => {
            if (!cambiando) {
                cerrarRotar();
                cerrarCrecer();
            }
        })
        
    });


  }

});
