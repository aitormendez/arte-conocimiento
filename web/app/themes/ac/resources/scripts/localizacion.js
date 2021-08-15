import L from 'leaflet';
import 'leaflet-fullscreen/dist/Leaflet.fullscreen';


$(document).ready(() => {
    if (document.body.classList.contains('contacto')) {



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
            mapa = document.querySelector('.map'),
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
      
});
  
