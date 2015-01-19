    <style>

      html, body, #map-canvas {

        width: 100%;

		height:630px;

        margin: 0px !important;

        padding: 0px !important;

		z-index: 1;

		background-color:#120306;

      }

    </style>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

    <script>

var map;

function initialize() {



  var styles = [

    {

      stylers: [

        { hue: "#EFE8DA" },

        { saturation: -40 }

      ]

    },{

      featureType: "road.local",

      elementType: "labels",

      stylers: [

        { lightness: 100 },

        { visibility: "simplified" }

      ]

    }

  ];



  var styledMap = new google.maps.StyledMapType(styles,

    {name: "Styled Map"});

  

  var mapOptions = {

    zoom: 14,

    /*center: new google.maps.LatLng(46.80194, -71.356913)*/

    center: new google.maps.LatLng(46.854505,-71.353435),

    mapTypeControlOptions: {

      mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']

    },
	draggable:false,
	scrollwheel: false

  };



  map = new google.maps.Map(document.getElementById('map-canvas'),

      mapOptions);



	var icon = new google.maps.MarkerImage("http://pioletdev.cortexmedia.ca/wp-content/themes/wpbootstrap/images/pin.png", new google.maps.Size(60, 72), new google.maps.Point(0, 0));

	var marker=new google.maps.Marker({

			  position:new google.maps.LatLng(46.854006,-71.356063),

			  icon: icon,

			  })

	marker.setMap(map);

	var contentString = "<p>103 rue Racine,<br /> Québec, Québec</p>";

	var infowindow = new google.maps.InfoWindow({

		content: contentString

	});		

	

	google.maps.event.addListener(marker, 'click', function() {

		infowindow.open(map, marker);

	});





  //Associate the styled map with the MapTypeId and set it to display.

  map.mapTypes.set('map_style', styledMap);

  map.setMapTypeId('map_style');

  

}



google.maps.event.addDomListener(window, 'load', initialize);



    </script>

<div class="contactbox-wrapper">

	<div class="contactbox">
	
		<div class="contacthr-cream"></div>
	
		<h3>CONTACTEZ-NOUS</h3>
	
		<div class="col">
	
			<div class="col1of2">
	
			Adresse:<br />
	
			103 rue Racine,<br />
	
			Québec, Québec<br />
	
			<br />
	
			Téléphone:<br />
	
			418 842-7462
	
			</div>
	
			<div class="col2of2">
	
			Télécopieur:<br />
	
			418 842-7495<br /><br />
	
			<br />
	
			Courriel:<br />
	
			<a href="mailto:reservation@lepiolet.com,restaurant@lepiolet.com?Subject=Reserver%20au%20restaurant">restaurant@lepiolet.com</a>
	
			</div> 
	
		</div>
	
		<div>&nbsp;</div>
	
		<a href="/notre-equipe" class="btncontact">
	
		CONTACTER UN<br />
	
		MEMBRE DE L'ÉQUIPE
	
		</a>
	
	</div>

</div>




<div id="contacteznous">



<div id="map-canvas"></div>


</div> <!-- end contacteznous -->

