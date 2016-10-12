function initMap() {
    var lyon = {lat: 45.763859, lng: 4.880444};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: lyon
    });
    var marker = new google.maps.Marker({
        position: lyon,
        map: map
    });
}


