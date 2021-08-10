import gsap from 'gsap/all';
import lightGallery from 'lightgallery';
import lgFullscreen from 'lightgallery/plugins/fullscreen';
import lgZoom from 'lightgallery/plugins/zoom';

$(document).ready(() => {
    if (document.body.classList.contains('single')) {


        // Cajón de metadatos
        // ----------------------------------------------------
        
        let info = document.querySelector('.info'),
        caret = document.querySelector('.info svg'),
        meta = document.querySelector('.meta'),
        infoAbierto = false;
        console.log(caret);
    
        info.abrir = () => {
            if (!infoAbierto) {
                gsap.killTweensOf(info);
                gsap.killTweensOf(meta);
                infoAbierto = true;
    
                gsap.to(meta, {
                    height: "auto",
                    duration: 3,
                    ease: "elastic",
                });
    
                gsap.to(caret, {
                    duration: 3,
                    rotation: 450,
                    ease: "elastic",
                });
            }
            console.log(infoAbierto);
        }
    
        info.cerrar = () => {
            if (infoAbierto) {
                gsap.killTweensOf(info);
                gsap.killTweensOf(meta);
                infoAbierto = false;
    
                gsap.to(meta, {
                    height: 0,
                    duration: 1,
                    ease: "bounce",
                    overwrite: 'auto'
                });
    
                gsap.to(caret, {
                    duration: 1,
                    rotation: 0,
                    ease: "bounce",
                    overwrite: 'auto'
                });
            }
            console.log(infoAbierto);
        }
    
        gsap.set(meta, {height: 0});
    
        console.log(meta);
    
        info.addEventListener("click", () => infoAbierto ? info.cerrar() : info.abrir());
    
    }


    // Galerías lightbox
    // ----------------------------------------------------

    let galerias = document.getElementsByClassName('lightbox');

    for (let i = 0; i < galerias.length; i++) {
      galerias[i].id = 'gal' + i;
      lightGallery(document.getElementById('gal' + i), {
        plugins: [lgFullscreen, lgZoom],
        selector: 'a',
      });
    }

 
      
});
  
