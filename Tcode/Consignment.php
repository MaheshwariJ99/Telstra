<!DOCTYPE html>
<?php include 'index.php';?>
<?php
	$serverName = "swanstransportation.database.windows.net";
	$connectionInfo = array("Database"=>"SwansTransportationDB","Uid"=>"SwansAdmin","PWD"=>"Swan@2019");
	$conn = sqlsrv_connect($serverName, $connectionInfo);
	if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}
	$sql= "SELECT  TOCAssetCondition";
	$stmt= sqlsrv_query($conn, $sql);
	 if ($stmt === FALSE){
 die( print_r( sqlsrv_errors(), true) );
}    
echo "<table border='1'>";
echo "<th>pressure</th><th>pressure</th><th>createdDataandTime</th><th>updataedtime</th><th>updatedbyuser</th></tr>";


while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
$resultArray[] = $row;

	       echo "<tr>";
        echo "<td>" . $row['assetID'] . "</td>";
        echo "<td>" . $row['deviceID'] . "</td>";
        echo "<td>" . $row['RFIDID'] . "</td>";
		echo "<td>" . $row['presssure'] . "</td>";
		echo "<td>" . $row['updatedbyUser'] . "</td>";	

		echo "<td>" . $row['createdDateTime'] . "</td>";
        echo "<td>" . $row['updatedDateTime'] . "</td>";
        echo "<td>" . $row['RFIDLastreadDatetime'] . "</td>";
        

    echo "</tr>";
 }
 echo "</table>";
    sqlsrv_free_stmt($getResults);
?>
