import {
  TweenMax,
  TimelineLite,
  Power2,
  Elastic
} from 'gsap/all';


TweenMax.to('.colores', {
  duration: 'random(2, 6)',
  background: 'radial-gradient(random(0, 200)% random(0, 200)% at random(0, 100)% random(0, 100)%, rgba(random(0, 255, 1), random(0, 255, 1), random(0, 255, 1), random(0, 0.5)) 0%, rgba(random(0, 255, 1), random(0, 255, 1), random(0, 255, 1), random(0, 0.5)) 100%),radial-gradient(random(0, 200)% random(0, 200)% at random(0, 100)% random(0, 100)%, rgba(random(0, 255, 1), random(0, 255, 1), random(0, 255, 1), random(0, 0.5)) 0%, rgba(random(0, 255, 1), random(0, 255, 1), random(0, 255, 1), random(0, 0.5)) 100%),radial-gradient(random(0, 200)% random(0, 200)% at random(0, 100)% random(0, 100)%, rgba(random(0, 255, 1), random(0, 255, 1), random(0, 255, 1), random(0, 0.5)) 0%, rgba(random(0, 255, 1), random(0, 255, 1), random(0, 255, 1), random(0, 0.5)) 100%)',
  repeat: -1,
  repeatRefresh: true,
  ease: "sine.inOut"
});
