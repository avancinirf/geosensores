
var map = L.map('map').setView([-22.9532, -43.27315], 13);
//Centraliza todo layer escolhido (municipiosLayer) na tela, ignora o zoom da variável map
//map.fitBounds(municipiosLayer.getBounds());


// Adicionando imagem de satélite
// Adição da camada do Google Maps
var googleLayer = new L.Google();
var googleRoadmapLayer = new L.Google('ROADMAP');
var googleTerrainLayer = new L.Google('TERRAIN');
map.addLayer(googleTerrainLayer);
var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png');//.addTo(map);


// Cria um estilo default para floresta
function style(feature) {
     return {
         fillColor: 'rgba(120,134,107,1)',
         fillOpacity: 0.55,
         weight: 1,
         opacity: 1,
         color: 'rgba(59,67,53,1)',
         dashArray: '5,3'
     };
 }


 function highlightFeature(e) {
     var layer = e.target;
     layer.setStyle({
         color: 'rgba(59,67,53,1)',
         fillColor: 'rgba(120,134,107,1)',
         fillOpacity: 0.75
     });

     if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
         layer.bringToFront();
     }
 }


 function resetHighlight(e) {
     geojson.resetStyle(e.target);
 }

 function mostraDados(e) {
   var layer = e.target;   
   mostraTexto(layer.feature.properties.setor, layer.feature.properties.nome);
 }

 function onEachFeature(feature, layer) {
     layer.on({
         mouseover: highlightFeature,
         mouseout: resetHighlight,
         click: mostraDados
     });
 }

 geojson = L.geoJson(floresta, {
     style: style,
     onEachFeature: onEachFeature
 }).addTo(map);

 map.fitBounds(geojson);
 var fotoIcon = L.icon({

    iconUrl: '../../assets/img/icone-foto.svg',
    iconSize:     [30, 20],
    iconAnchor:   [12, 20],
    popupAnchor:  [-3, -15]
  });



// add markers with popup info
function onEachFeature_pontos(feature, layer) {
    layer.on({
        click: mostraPopup
    });
}

function mostraPopup(e) {
  var layer = e.target;

  layer.bindPopup(
    "<p style='font-size:16px; font-family: cursive;'><b>Nome: </b>" + layer.feature.properties.nome + "</p>" +
    "<img src='../../assets/img/" + layer.feature.properties.foto + "' width='200'>"
  );
}

// add markers with custom icons
var geoJsonLayer_pontos = L.geoJson(pontos, {
    // Função de popup com dados do geoJson
    onEachFeature: onEachFeature_pontos,
    // Altera o ícone de um geoJson
    pointToLayer: function (feature, latlng) {
      return L.marker(latlng, {icon: fotoIcon});
    }
  }).bindPopup(function (layer) {
    return layer.feature.properties.nome;
    }).addTo(map);








// Adicionando as variáveis aos controles no mapa
var baseMaps = {
  'Google' : googleLayer,
  'Google Roadmap' : googleRoadmapLayer,
  'Google Terrain' : googleTerrainLayer
};
var overlayMaps = {
  'Floresta da Tijuca' : geojson,
  'Pontos turísticos'  : geoJsonLayer_pontos
};


// Adicionando os Layers no controle de camadas
L.control.layers(baseMaps, overlayMaps).addTo(map);

function mostraTexto(setor, nome){
  $(".informe").removeClass("hidden");
  $( "#titulo" ).html(nome + "<br>SETOR "+ setor);
};
