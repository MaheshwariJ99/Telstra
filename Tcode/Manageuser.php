<!DOCTYPE html>
<?php include 'index.php';?>
<html lang="en">
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple Polylines</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 50%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

      // This example creates a 2-pixel-wide red polyline showing the path of
      // the first trans-Pacific flight between Oakland, CA, and Brisbane,
      // Australia which was made by Charles Kingsford Smith.

      function initMap() {
	  	 //document.writeln ("hello world");

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: {lat: -37.8755397, lng: 145.0838371},
          mapTypeId: ''
        });
		
		//document.writeln("latitude6=".$resultarray[5]['Latitude']);


        var flightPlanCoordinates =	<?php echo json_encode($resultarray); ?>; 
        //{lat:-37.8755397 , lng: 145.0838371},
        // {lat: -37.8865538,	lng:145.0951111},
        // {lat: -37.8911985, lng:	145.1209347},
		// {lat: -37.888943 , lng: 145.1148025},
        //];
		
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        flightPath.setMap(map);
      }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtzrqBiFeFreTdQmW4IpXqu9DWHjftZ08&callback=initMap">
    </script>
  </body>
</html>
<?php
	$serverName = "swanstransportation.database.windows.net";
	$connectionInfo = array("Database"=>"SwansTransportationDB","Uid"=>"SwansAdmin","PWD"=>"Swan@2019");
	$conn = sqlsrv_connect($serverName, $connectionInfo);
        //Connect to the MySQL database that is holding your data, replace the x's with your data
       if( $conn === false	 ) {
    die( print_r( sqlsrv_errors(), true));
}
		$sql= "SELECT Longitude as Latitude, Latitude as Longitude FROM TOCVehicleDynamics";
		$stmt= sqlsrv_query($conn, $sql);
	 if ($stmt === FALSE){
 die( print_r( sqsrv_errors(), true) );
}
//$resultarray = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
$resultA[] = $row;
}
//}
//for($i = 0; $resultarray[$i] = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC); $i++);
//echo "test2";
foreach ($resultA as $result)
{
	  echo ("latitude=".$result['Latitude']);
	  echo ("longitude=". $result['Longitude']);
	  }
$lat = $result['Latitude'];
$long =  $result['Longitude'];
	echo $lat;

	  
	  echo "<script type='text/javascript'>
     initMap();</script>";
?>
