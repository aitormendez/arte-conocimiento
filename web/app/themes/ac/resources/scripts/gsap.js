import {
  TweenMax,
  TimelineLite,
  Power2,
  Elastic,
  CSSPlugin
} from "gsap/all";

let R, G, B, dur;

const setVars = () => {
  R = Math.floor((Math.random() * 255)),
    G = Math.floor((Math.random() * 255)),
    B = Math.floor((Math.random() * 255)),
    dur = Math.floor((Math.random() * 4000));
}

const getColor = () => {
  setVars();
  return `rgb(${R}, ${G}, ${B})`;
};

setVars();

TweenMax.to(".colores", {
  duration: 1,
  backgroundColor: 'white',
});
