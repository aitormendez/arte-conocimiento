import {
 gsap
} from 'gsap/all';

gsap.set('.colores', {
  backgroundImage: 'radial-gradient(100% 102.5% at 16% 80%, rgba(0, 133, 255, 0.76) 0%, rgba(255, 255, 255, 0) 100%), radial-gradient(100% 102% at 80% 20%, rgba(0, 133, 255, 0.76) 0%, rgba(255, 255, 255, 0) 100%), radial-gradient(100% 100% at 20% 80%, rgba(255, 245, 0, 0.76) 0%, rgba(255, 255, 255, 0) 100%)'
})


gsap.to('.colores', {
  duration: '2',
  backgroundImage: 'radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.76) 0%, rgba(255, 255, 255, 0) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(255, 245, 0, 0.76) 0%, rgba(255, 255, 255, 0) 100%), radial-gradient(random(100, 200)% random(50, 200)% at random(0, 100)% random(0, 100)%, rgba(0, 133, 255, 0.76) 0%, rgba(255, 255, 255, 0) 100%)',
  repeat: -1,
  repeatRefresh: true,
  ease: "sine.inOut"
});


