/**
 * Marcadores
 **/
var styles = {
    'Point': [new ol.style.Style({
        image: new ol.style.Icon({
            anchor: [0.5, 0.5],
            size: [197, 197],
            offset: [0, 0],
            opacity: 0.8,
            scale: 0.4,
            src: "images/sensor.png"
   })
    })]
};

var styles2 = {
  'Point': [new ol.style.Style({
      image: new ol.style.Icon({
          anchor: [0.5, 0.5],
          size: [197, 197],
          offset: [0, 0],
          opacity: 0.8,
          scale: 0.4,
          src: "images/shelter.png"
 })
  })]
};

var styleFunction = function(feature, resolution) {
  return styles[feature.getGeometry().getType()];
};

var styleFunction2 = function(feature, resolution) {
  return styles2[feature.getGeometry().getType()];
};

var geojson_layer = new ol.layer.Vector({
  title: 'Sensores', 
  source: new ol.source.Vector({
      url: 'data/file.geojson',
      format: new ol.format.GeoJSON()
  }),
  style: styleFunction
});

var geojson_layer2 = new ol.layer.Vector({
  title: 'Refugios', 
  source: new ol.source.Vector({
      url: 'data/file2.geojson',
      format: new ol.format.GeoJSON()
  }),
  style: styleFunction2
});

/**
 * Genera Boton de Localizacion y lo anade a los controles
 **/
var myLocBtn = document.createElement('button');
myLocBtn.id ="myLocalizationBtn";
myLocBtn.innerHTML = '<i class="fas fa-crosshairs"></i>';

var element = document.createElement('div');
element.className = 'ol-unselectable ol-control';
element.style.top ='80px';
element.style.left= '8px';
element.appendChild(myLocBtn);

var controls = new ol.control.defaults({   
            attribution: false
          }).extend([
            new ol.control.Control({
              element:element
            })
          ])

/**
 * Genera Mapa
 **/

var olview = new ol.View({
  center: ol.proj.fromLonLat([-74.0941,4.658523]),
  zoom: 11,
  minZoom: 1,
  maxZoom: 20
});

var map = new ol.Map({
controls: controls,
target: document.getElementById('map'),
view: olview,
layers: [
    new ol.layer.Tile({
      source: new ol.source.OSM()
  }), geojson_layer, geojson_layer2
]
});

map.addControl(new ol.control.LayerSwitcher());

var watercolor = 	new ol.layer.Tile({
  source: new ol.source.Stamen({
    layer: 'watercolor'
})
});

var heatmap = new ol.layer.Heatmap({
      source: new ol.source.Vector({
        url: 'https://openlayers.org/en/v5.2.0/examples/data/kml/2012_Earthquakes_Mag5.kml',
        format: new ol.format.KML({ extractStyles: false })
      }),
      blur: 20, // viewof blur.value, // parseInt(blur.value, 10),
      radius: 10 // viewof radius.value // parseInt(radius.value, 10)
    });

    var layer_cloud = new ol.layer.Tile({
      title: "Precipitacion",
      source: new ol.source.OSM({
          // Replace this URL with a URL you generate. To generate an ID go to http://home.openweathermap.org/
          // and click "map editor" in the top right corner. Make sure you're registered!
          url: 'http://tile.openweathermap.org/map/precipitation_new/{z}/{x}/{y}.png?appid=d22d9a6a3ff2aa523d5917bbccc89211',
          tileOptions: {
              crossOriginKeyword: 'anonymous'
          },
          crossOrigin: null
      })
  });

 layer_cloud.setOpacity(0.5);

  var map2 = new ol.Map({
    controls: controls,
    target: document.getElementById('map2'),
    view: olview,
    layers: [
        new ol.layer.Tile({
          source: new ol.source.OSM()
      }), watercolor, heatmap, geojson_layer, geojson_layer2
    ]
    });

    map2.addLayer(layer_cloud);
/**
 * Localizacion watercolor, heatmap, geojson_layer, geojson_layer2
 **/
var geolocation = new ol.Geolocation({ 
  trackingOptions: {
    enableHighAccuracy: true // enableHighAccuracy deber ser "true" para obtener el valor de orientacion.
  },
  projection: olview.getProjection()
});

function el(id) {
  return document.getElementById(id);
}

//solicita permisio de geolocalizacion
el('myLocalizationBtn').addEventListener('click', function() {
  geolocation.setTracking(true);
});

// en caso de que no se tenga la posicion (respuesta negatia por parte del usuario).
geolocation.on('error', function(error) {
  var info = document.getElementById('info');
  info.innerHTML = error.message;
  info.style.display = '';
});

//si el usuario permite se locazaliza

//estilos del marcador
var accuracyFeature = new ol.Feature();
geolocation.on('change:accuracyGeometry', function() {
  accuracyFeature.setGeometry(geolocation.getAccuracyGeometry());
});

var positionFeature = new ol.Feature();
positionFeature.setStyle(new ol.style.Style({
  image: new ol.style.Circle({
    radius: 9,
    fill: new ol.style.Fill({
      color: '#3399CC'
    }),
    stroke: new ol.style.Stroke({
      color: '#fff',
      width: 3
    })  
  })
}));

//obtiene la localizacion
var coordsPrecision = 10;

$('#myLocalizationBtn').click(function(evt){
  evt.preventDefault();
 navigator.geolocation.getCurrentPosition(function(pos) {
    
  defaultCoords = {
    long: (parseFloat(pos.coords.longitude).toPrecision(coordsPrecision) *1), 
    lat: (parseFloat(pos.coords.latitude).toPrecision(coordsPrecision) *1)
  };

   map.setView(new ol.View({
           center: ol.proj.fromLonLat([defaultCoords.long, defaultCoords.lat]),
           zoom: 17,
           
    }));
    var coordinates = ([defaultCoords.long, defaultCoords.lat]);
    positionFeature.setGeometry(coordinates ?
      new ol.geom.Point(ol.proj.transform(coordinates, 'EPSG:4326',     
      'EPSG:3857')) : null);
});
})

//dibuja capa con punto de localizacion y radio de exactitud 
new ol.layer.Vector({
  map: map, 
  source: new ol.source.Vector({
    features: [accuracyFeature, positionFeature]
  })
});

new ol.layer.Vector({
  map: map2, 
  source: new ol.source.Vector({
    features: [accuracyFeature, positionFeature]
  })
});

/**
 * Popup
 **/
var
    container = document.getElementById('popup'),
    content_element = document.getElementById('popup-content'),
    closer = document.getElementById('popup-closer');

closer.onclick = function() {
    overlay.setPosition(undefined);
    closer.blur();
    return false;
};
var overlay = new ol.Overlay({
    element: container,
    autoPan: true,
    offset: [0, -10]
});
map2.addOverlay(overlay);

var fullscreen = new ol.control.FullScreen();
map.addControl(fullscreen);

map.on('click', function(evt){
    var feature = map.forEachFeatureAtPixel(evt.pixel,
      function(feature, layer) {
        return feature;
      });
    if (feature) {
        var geometry = feature.getGeometry();
        var coord = geometry.getCoordinates();
        
        var content = '<h3>' + feature.get('name') + '</h3>' + '<img class="delimitador" src="images/delimiter-orange.png" alt="Delimitador">';
        content += '<h5>' + feature.get('capacity') + '</h5>';content += '<h5>' + feature.get('description') + '</h5>'; content += '<h5>' + feature.get('details') + '</h5>';
        content += '<img class="foto"' + feature.get('srcFoto') + 'alt="Foto">';

        content_element.innerHTML = content;
        overlay.setPosition(coord);
        
    }
});

map.on('pointermove', function(e) {
    if (e.dragging) return;
       
    var pixel = map.getEventPixel(e.originalEvent);
    var hit = map.hasFeatureAtPixel(pixel);
    
    map.getTarget().style.cursor = hit ? 'pointer' : '';
});

map2.on('click', function(evt){
  var feature = map2.forEachFeatureAtPixel(evt.pixel,
    function(feature, layer) {
      return feature;
    });
  if (feature) {
      var geometry = feature.getGeometry();
      var coord = geometry.getCoordinates();
      
      var content = '<h3>' + feature.get('name') + '</h3>' + '<img class="delimitador" src="images/delimiter-orange.png" alt="Delimitador">';
      content += '<h5>' + feature.get('capacity') + '</h5>';content += '<h5>' + feature.get('description') + '</h5>'; content += '<h5>' + feature.get('details') + '</h5>';
      content += '<img class="foto"' + feature.get('srcFoto') + 'alt="Foto">';

      content_element.innerHTML = content;
      overlay.setPosition(coord);
      
  }
});

map2.on('pointermove', function(e) {
  if (e.dragging) return;
     
  var pixel = map2.getEventPixel(e.originalEvent);
  var hit = map2.hasFeatureAtPixel(pixel);
  
  map2.getTarget().style.cursor = hit ? 'pointer' : '';
});