<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyBO4bpr0RvxO0esRe_PkDcDCycliPWSwS0"></script>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?keyAIzaSyBO4bpr0RvxO0esRe_PkDcDCycliPWSwS0&callback=initMap&v=weekly"></script> -->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script type="text/javascript">
    // let poly;
    // let map;
    function initialize() {
        const queryString = window.location.search;
        // console.log(queryString);
        const urlParams = new URLSearchParams(queryString);
        const allLatitudes = JSON.parse(urlParams.get('allLatitudes'))
        const allLongitudes = JSON.parse(urlParams.get('allLongitudes'))
        const allNames = JSON.parse(urlParams.get('allnames'))
        
        const latlngarray = [];
        for (i = 0; i < allLongitudes.length; i++) {  
            latlngarray.push({ lat: allLatitudes[i], lng: allLongitudes[i] })
        }
        // console.log(latlngarray);
        var latlng = new google.maps.LatLng(allLatitudes[0],allLongitudes[0]);
        // var polylinetes = new google.maps.Polyline(allLatitudes[0],allLongitudes[0]);
        // console.log(latitude,longitude);
        var myOptions = {
            zoom: 13,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        var polymapstes = new google.maps.Polyline({
            path: latlngarray,
            geodesic: true,
            strokeColor: "#00b3ff",
            strokeOpacity: 1.0,
            strokeWeight: 2,
        })

        

        var marker, i;
        
        for (i = 0; i < allLongitudes.length; i++) {  
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(allLatitudes[i], allLongitudes[i]),
                map: map
            });

            var infowindow = new google.maps.InfoWindow();

            infowindow.setContent(allNames[i]);
            infowindow.open(map, marker);

            // google.maps.event.addListener(marker, 'click', (function(marker, i) {
            //     return function() {
            //         infowindow.setContent(allNames[i]);
            //         infowindow.open(map, marker);
            //     }
            // })(marker, i));

        }
        polymapstes.setMap(map);
    }
</script>
</head>
<body onload="initialize()">
 <div id="map_canvas" style="width:1200px; height:600px"></div>
</body>
</html>