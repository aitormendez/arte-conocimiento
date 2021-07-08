import {
  TweenMax,
  TimelineLite,
  Power2,
  Elastic
} from 'gsap/all';


TweenMax.to('.colores', {
  duration: 'random(10, 20)',
  background: 'radial-gradient(random(100, 200)% random(100, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.76) 0%, rgba(255, 255, 255, 0) 100%), radial-gradient(random(100, 200)% random(100, 200)% at random(0, 100)% random(0, 100)%, rgba(255, 245, 0, 0.76) 0%, rgba(255, 255, 255, 0) 100%), radial-gradient(random(100, 200)% random(100, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.76) 0%, rgba(255, 255, 255, 0) 100%)',
  repeat: -1,
  repeatRefresh: true,
  ease: "sine.inOut"
});


