<?php
$hostname   = "10.15.21.41:3306";
$dbname     = "simethrisdev";
$username   = "simethrisdev";
$password   = "72So2jtUs2UOEO6A";
?>
<?php
	//=================sublime====================
	// ctrl K + ctrl 2 fold level 2
	// ctrl + F  regex ^\s*$ find all backspace
	//--------------------------------------------
	// conn_mysqli
	$conn_mysqli = new mysqli($hostname, $username, $password, $dbname);
	if ($conn_mysqli->connect_error) {
	    die("Connection failed: " . $conn_mysqli->connect_error);
	};
	echo '<br>';
	echo 'Connection success to '.$dbname.' via mysqli';
	echo '<br>';
	$result = $conn_mysqli->query("SELECT 'Hello, dear MySQL user!' AS _message FROM DUAL");
	$row = $result->fetch_assoc();
	echo htmlentities($row['_message']);
	echo '<br>';
	echo '<br>';
	$conn_mysqli->close();	
?>
<?php
	// PDO
	$conn_pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password);
	if (!$conn_pdo) {
	    die("Connection via PDO failed: " . $conn_pdo->connect_error);
	};
	echo '<br>';
	echo 'Connection success to '.$dbname.' via PDO dsn';
	echo '<br>';
	$statement = $conn_pdo->query("SELECT 'Hello, dear MySQL user!' AS _message FROM DUAL");
	$row = $statement->fetch(PDO::FETCH_ASSOC);
	echo htmlentities($row['_message']);
	echo '<br>';
	echo '<br>';
?>
<?php
	$conn_myc = mysqli_connect($hostname, $username, $password);
	// Check connection
	if (!$conn_myc) {
	    die("Connection via mysqli_connect failed: " . mysqli_connect_error());
	};
	echo '<br>';
	echo 'Connection success to '.$dbname.' via mysqli_connect ';
	echo '<br>';
	$sql = "SELECT 'Hello, dear MySQL user!' AS _message FROM DUAL";
	$result = mysqli_query($conn_myc, $sql);
	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	           echo $row['_message'];
	    }
	} else {
	    echo "0 results";
	};
	mysqli_close($conn_myc); 
?>