<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" href="styles/styles.css">
	
</head>
<body>

<h1><?php echo 'Hello World';?></h1>


<?php
session_start();
?>
	
	<?php
	require_once("login_db.php");
	
	$sql = "UPDATE Counter SET visits = visits+1";
	$conn->query($sql);
	
	$sql = "SELECT visits FROM Counter";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["visits"];
	}
	
	} else {
        echo "no results";
	}

    
    ?>

<p>You are visitor #: <?php print $visits; ?></p>


</body>
</html>

<?php
$conn->close(); 
?>



