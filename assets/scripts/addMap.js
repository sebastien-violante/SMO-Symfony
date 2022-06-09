import Map from 'ol/Map';
import View from 'ol/View';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import {fromLonLat} from "ol/proj";
import Overlay from 'ol/Overlay';
import {defaults} from 'ol/control';

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
      attributionOptions: {
        collapsible: false
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