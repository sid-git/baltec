
/*==Google MAP==*/
function initialize() {
    var image = wpdata.td+'/img/map-marker.png';
    var lat = geo.lat;
    var lon = geo.lon;
    if(!lat) lat = -37.817314;
    if(!lon) lon = 144.955431;
    var myLatlng = new google.maps.LatLng(lat, lon);
    var mapOptions = {
        zoom: 15,
        scrollwheel: false,
        navigationControl: false,
        mapTypeControl: false,
        scaleControl: false,
        draggable: false,
        center: myLatlng
    };

    var map = new google.maps.Map(document.getElementById('map'), mapOptions);

    var contentString = document.getElementById("marker-content").innerHTML;

    var infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 280
    });


    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        icon: image,
        animation: google.maps.Animation.DROP,
        title: 'Local Address'
    });

    google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map, marker);
    });

}

google.maps.event.addDomListener(window, 'load', initialize);