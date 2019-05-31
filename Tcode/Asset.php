<?php include 'index.php';?> 
<?php
	$serverName = "swanstransportation.database.windows.net";
	$connectionInfo = array("Database"=>"SwansTransportationDB","Uid"=>"SwansAdmin","PWD"=>"Swan@2019");
	$conn = sqlsrv_connect($serverName, $connectionInfo);
        //Connect to the MySQL database that is holding your data, replace the x's with your data
       if( $conn === false	 ) {
    die( print_r( sqlsrv_errors(), true));
}
		$sql= "SELECT Longitude, Latitude FROM TOCVehicleDynamics WHERE Latitude ='144.8059635'";
		$stmt= sqlsrv_query($conn, $sql);
	 if ($stmt === FALSE){
 die( print_r( sqsrv_errors(), true) );
}
$lat;
$long;
//echo "<table border='1'>";
//echo "<th>Long</th><th>Latt</th>";
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
	//echo "<tr>";
      //echo ("long"."=". $row['Longitude']." ");
	  //echo ("Latitude"."=". $row['Latitude']." ");
	  echo ("longitude=". $row['Longitude']);
	  echo ("Latitude=". $row['Latitude']);

 $lat = $row['Latitude'];
$long =  $row['Longitude'];
	  echo $long;
	  echo $lat;

//echo '<script type="text/javascript">',
  //   'myMap($long, $lat);',
  //   '</script>';

		//echo "</tr>";
//echo "</table>";
}
	  echo $long;
	  echo $lat;
echo '<script type="text/javascript">',
     'myMap();',
     '</script>';
?>

<!DOCTYPE html>
<html>
<body>

<h1>My First Google Map</h1>


<div id="googleMap" style="width:50%;height:200px;"></div>
    
  
<script>

function myMap() {
//document.writeln("longitude");
//document.writeln (longitude);
longitude= '<?php echo $long; ?>';//'-37.8098393';
latitude='<?php echo $lat; ?>';
document.writeln (longitude);
document.writeln (latitude);
var mapProp= {
  center:new google.maps.LatLng(longitude, latitude),
  zoom:15,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtzrqBiFeFreTdQmW4IpXqu9DWHjftZ08&callback=myMap"></script>

</body>
</html>