<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/leaflet/leaflet.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/leaflet/leaflet.js'); ?>"></script>

<!-- Google Maps Usando a minha chave de autenticação. depois tem que trocar -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBl1SdQ-UFRODLSyE17Ddn8RPPfrX44brg"></script>
<script src="<?php echo base_url('assets/leaflet/Google.js'); ?>"></script>

<script src="<?php echo base_url('assets/data/floresta_tijuca.geojson'); ?>"></script>
<script src="<?php echo base_url('assets/data/pontos_tijuca.geojson'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/style_mapa_simples.css'); ?>">


<div class="informe hidden">
     <h3 id="titulo"></h3>
</div>

<div id="map"></div>

<script src="<?php echo base_url('assets/js/mapa_simples.js'); ?>"></script>
