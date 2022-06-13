import '../styles/around.css';

import Map from 'ol/Map';
import View from 'ol/View';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import {fromLonLat} from "ol/proj";
import Overlay from 'ol/Overlay';
import {defaults} from 'ol/control';

// const sectionsToToggle = [...document.getElementsByClassName('section-to-toggle')];
const filters = [...document.querySelectorAll('.filter-icon')];

document.getElementById('filters').addEventListener('click', (e) => {
    console.log(e.target.id);
    if(e.target.id !== "filters") {
        filters.forEach(filter => {
            filter.id === e.target.id ? filter.classList.add('chosen') : filter.classList.remove('chosen');
        });
    };
});

const mapGenerator = () => {
  const mapHolder = document.getElementById('map');
  const lat = mapHolder.dataset.latitude;
  const long = mapHolder.dataset.longitude;

  const map = new Map({
    target: 'map',
    layers: [
      new TileLayer({
        source: new OSM()
      })
    ],
    view: new View({
      center: fromLonLat([long, lat]),
      zoom: 14
    }),
    controls: defaults({
      rotate: false,
      zoom: false,
      attributionOptions: {
        collapsible: true,
        collapsed: true
      }
    })
  })

  const positionPin = new Overlay({
    element: document.getElementById('overlay')
  });
  positionPin.setPosition(fromLonLat([long, lat]));
  map.addOverlay(positionPin);
};

  export default mapGenerator();