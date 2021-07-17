import {
 gsap, Power3, random
} from 'gsap/all';

// animación degradados enlaces que no son '.normal'

document.querySelectorAll('a:not(.normal)').forEach((item, i) => {
    item.addEventListener('mouseenter', event => {
        item.id = 'color-enlace-' + i;
        gsap.set('#color-enlace-' + i, {
            backgroundImage: 'radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(255, 245, 0, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.9) 0%, rgba(255, 255, 255, 0.3) 100%)',
        })
        gsap.to('#color-enlace-' + i, {
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
        gsap.killTweensOf('#color-enlace-' + i);
    })
  })

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

  