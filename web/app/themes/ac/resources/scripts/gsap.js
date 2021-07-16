import {
 gsap, Power3, random
} from 'gsap/all';

// let colores = document.getElementsByClassName('colores');

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


document.querySelectorAll('.color-ya').forEach((item, i) => {
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

  