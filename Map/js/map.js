

function initialize() {
    var mapOptions = {
        zoom: 6,
        center: new google.maps.LatLng(20.291, 153.027),
        mapTypeId: google.maps.MapTypeId.TERRAIN
    };

    var map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

    // [START region_polyline]
    // Define a symbol using SVG path notation, with an opacity of 1.
    var planeSymbol = {

        path: "M-20,0a20,20 0 1,0 40,0a20,20 0 1,0 -40,0",
        fillColor: '#FF0000',
        fillOpacity: .6,
        anchor: new google.maps.Point(0,0),
        scale: .8,
        strokeColor: '#393'

    };
    var lineCoordinates = [
        new google.maps.LatLng( 43.568036,1.464547),
        new google.maps.LatLng( 43.60595,1.448989),
        new google.maps.LatLng( 43.610925,1.45505),
        new google.maps.LatLng( 43.611322,1.454112),
        new google.maps.LatLng( 48.841157,2.320474),
        new google.maps.LatLng( 48.843466,2.323072),
        new google.maps.LatLng( 48.891934, 2.237883),
        new google.maps.LatLng( 48.889444, 2.242611)
    ];

    var visibleLine = new google.maps.Polyline({
        path: lineCoordinates,
        strokeOpacity: 0.3,
        map: map
    });

    var staticMark = new google.maps.Marker({
        map: map,
        position: lineCoordinates[0],
        icon: planeSymbol,
        visible: false // hide the static marker
    });
    var bounds = new google.maps.LatLngBounds();
    bounds.extend(lineCoordinates[0]);
    bounds.extend(lineCoordinates[7]);
    // Create the polyline, passing the symbol in the 'icons' property.
    // Give the line an opacity of 0.
    var line = new google.maps.Polyline({
        path: lineCoordinates,
        strokeOpacity: 0,
        icons: [{
            icon: planeSymbol,
            offset: '0'
        }],
        map: map
    });
    map.fitBounds(bounds);
    animatePlane(line);

    // [END region_polyline]
}
// Use the DOM setInterval() function to change the offset of the symbol
// at fixed intervals.

function animatePlane(line) {
    var count = 0;
    window.setInterval(function() {
        count = (count + 1) % 2000;

        var icons = line.get('icons');
        icons[0].offset = (count / 20) + '%';
        line.set('icons', icons);
    }, 20);
}
google.maps.event.addDomListener(window, 'load', initialize);

