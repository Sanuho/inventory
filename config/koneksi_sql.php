<?php
$serverName = "172.16.230.5";  


$connectionInfo = array( "Database"=>"SPISy_TMISC", "UID"=>"sa", "PWD"=>"@dm1nTMIS");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

?>

