// Set up the map centered on Lian, Batangas, Philippines
const Mmap = L.map('map').setView([13.9308, 120.648], 13);

// Google streets
const googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 21,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
}).addTo(Mmap);

// Satellite layer
const googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
});

googleSat.addTo(Mmap);

// Control what layers to see on the map
const baseLayers = {
    "Google Map": googleStreets,
    "Satellite": googleSat,
};

L.control.layers(baseLayers).addTo(Mmap);

const geocoderNominatim = new L.Control.Geocoder.Nominatim();
const geocoder = L.Control.geocoder({
    defaultMarkGeocode: false,
    geocoder: geocoderNominatim
}).on('markgeocode', function(e) {
    const box = e.geocode.center;
    const name = e.geocode.name;
    document.getElementById("Latitude").value = box.lat;
    document.getElementById("Longitude").value = box.lng;
    document.getElementById("Location").value = e.geocode.name;
    const MarkLayer = L.marker([box.lat, box.lng], { draggable: true }).addTo(Mmap)
        .on('dragend', onDragEnd)
        .bindPopup(e.geocode.name)
        .openPopup();
    displayLatLng(box);

    const group = new L.featureGroup([MarkLayer]);

    Mmap.fitBounds(group.getBounds());

}).addTo(Mmap);

function onDragEnd(event) {
    const latlng = event.target.getLatLng();
    geocoderNominatim.reverse(latlng, Mmap.options.crs.scale(Mmap.getZoom()),
        function(reverseGeocoded) {
            event.target.setPopupContent(reverseGeocoded[0].name).openPopup();
            document.getElementById("Location").value = reverseGeocoded[0].name;
        }, this);
    displayLatLng(latlng);
}

function displayLatLng(latlng) {
    document.getElementById("Latitude").value = latlng.lat;
    document.getElementById("Longitude").value = latlng.lng;
}
