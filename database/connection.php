
<?php
	$host = "127.0.0.1";
	$user = "root";
	$password = "";
	$dbName = "scoring";
	$port = 3307;
	$conn = new mysqli($host, $user, $password, $dbName, $port);

	if($conn->connect_errno){
		echo "Failed to connect to MySQL: ( ".$conn->connect_errno ." ) ".$conn->connect_error;
	}
?>
