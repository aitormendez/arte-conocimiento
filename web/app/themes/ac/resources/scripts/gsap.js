import {
 gsap, Power3, random
} from 'gsap/all';

// gsap.set('.colores', {
//   backgroundImage: 'radial-gradient(100% 102.5% at 16% 80%, rgba(0, 133, 255, 0.76) 0%, rgba(255, 255, 255, 0) 100%), radial-gradient(100% 102% at 80% 20%, rgba(0, 133, 255, 0.76) 0%, rgba(255, 255, 255, 0) 100%), radial-gradient(100% 100% at 20% 80%, rgba(255, 245, 0, 0.76) 0%, rgba(255, 255, 255, 0) 100%)'
// })


// gsap.to('.colores', {
//   duration: '2',
//   backgroundImage: 'radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.76) 0%, rgba(255, 255, 255, 0) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(255, 245, 0, 0.76) 0%, rgba(255, 255, 255, 0) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.76) 0%, rgba(255, 255, 255, 0) 100%)',
//   repeat: -1,
//   repeatRefresh: true,
//   ease: "sine.inOut"
// });



/* 
 * Botón hamburguesa y solapa abatible movil
 */

let hamb = $('#hamb');
let h = $('.h');
let solapa = $('.solapa');
let menuItems = $('.my-menu-item');
let hambObj = {
    estado: 'cerrado',
    abrir: function(){
        this.estado = 'abierto';
        hambDesintegrar.invalidate();
        hambDesintegrar.restart();
        console.log(this.estado);
        hambFlotar.pause();
        abrirSolapa.restart();
        menuItemsStagger.restart();
    },
    cerrar: function(){
        this.estado = 'cerrado';
        hambDesintegrar.reverse();
        console.log(this.estado);
        hambFlotar.play();
        cerrarSolapa.restart();
    },
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

let cerrarSolapa = gsap.to( solapa, {
    left: '-100%',
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

hamb.click(function() {
    if (hambObj.estado == 'cerrado') {
        hambObj.abrir();    
    } else if (hambObj.estado == 'abierto') {
        hambObj.cerrar(); 
    }
})

