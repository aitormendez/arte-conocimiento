import gsap from 'gsap/all';
import lightGallery from 'lightgallery';
import lgFullscreen from 'lightgallery/plugins/fullscreen';
import lgZoom from 'lightgallery/plugins/zoom';
import L from 'leaflet';
import 'leaflet-fullscreen/dist/Leaflet.fullscreen';


$(document).ready(() => {
    if (document.body.classList.contains('single')) {

        const el = document.querySelector('article');
        console.log(el);

        if (el.classList.contains('mapa')) {
            // Leaflet mapa
            // https://github.com/btpschroeder/leaflet-webpack/blob/master/src/index.js

            const myIcon = L.icon({
                iconUrl: '/app/themes/ac/public/images/marker.svg',
                iconSize: [32, 21],
                iconAnchor: [10, 15],
                popupAnchor: [0, 0],
                // shadowUrl: 'my-icon-shadow.png',
                // shadowSize: [68, 95],
                // shadowAnchor: [22, 94]
            });


            const 
                mapa = document.getElementById('map'),
                lat = mapa.getAttribute('lat'),
                lng = mapa.getAttribute('lng'),
                zoom = mapa.getAttribute('zoom');

            
            const basemap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
            // attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community'
            });

            const map = L.map('map', {
                center: [lat, lng],
                zoom: zoom,
            });

            map.addControl(new L.Control.Fullscreen());

            basemap.addTo(map);
            L.marker([lat, lng], {icon: myIcon}).addTo(map);
        }
      


        // Cajón de metadatos
        // ----------------------------------------------------
        
        let info = document.querySelector('.info'),
        caret = document.querySelector('.info svg'),
        meta = document.querySelector('.meta'),
        infoAbierto = false;
    
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
        }
    
        gsap.set(meta, {height: 0});

    
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
  
