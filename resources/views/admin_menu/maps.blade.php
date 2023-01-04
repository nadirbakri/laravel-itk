<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyBO4bpr0RvxO0esRe_PkDcDCycliPWSwS0"></script>
<script type="text/javascript">
    function initialize() {
    const queryString = window.location.search;
    // console.log(queryString);
    const urlParams = new URLSearchParams(queryString);
    const longitude = urlParams.get('longitudes')
    const latitude = urlParams.get('latitudes')
    const names = urlParams.get('names')

    var latlng = new google.maps.LatLng(latitude,longitude);
    // var polyline = L.polyline(latlng, {color: 'blue'}).addTo(map);
    // console.log(latitude,longitude);
    var myOptions = {
    zoom: 13,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),
    myOptions);
    var marker;
    var infowindow = new google.maps.InfoWindow();
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(latitude,longitude),
        map: map
    }); 

    infowindow.setContent(names);
    infowindow.open(map, marker);

    }
</script>
</head>
<body onload="initialize()">
 <div id="map_canvas" style="width:1200px; height:600px"></div>
</body>
</html>