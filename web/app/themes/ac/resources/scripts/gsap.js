import {
 gsap, Power3, random
} from 'gsap/all';

// let colores = document.getElementsByClassName('colores');

document.querySelectorAll('.colores').forEach((item, i) => {
    item.addEventListener('mouseenter', event => {
        item.id = 'color-' + i;
        gsap.set('#color-' + i, {
            backgroundImage: 'radial-gradient(100% 102.5% at 16% 80%, rgba(0, 133, 255, 0.90) 0%, rgba(255, 255, 255, 0) 100%), radial-gradient(100% 102% at 80% 20%, rgba(0, 133, 255, 0.90) 0%, rgba(255, 255, 255, 0) 100%), radial-gradient(100% 100% at 20% 80%, rgba(255, 245, 0, 0.90) 0%, rgba(255, 255, 255, 0) 100%)'
        })
        gsap.to('#color-' + i, {
              duration: '1',
              backgroundImage: 'radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.8) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(255, 245, 0, 0.8) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.8) 0%, rgba(255, 255, 255, 0.3) 100%)',
              repeat: -1,
              repeatRefresh: true,
              ease: "sine.inOut",
            });
    })
    item.addEventListener('mouseleave', event => {
        gsap.killTweensOf('#color-' + i);
    })
  })
