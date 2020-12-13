<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" href="styles/styles.css">
	
</head>
<body>

<h3><?php echo 'Hello World';?></h3>

<form method='POST'>
	What is your name? <input type="text" id="name" name="name">
	<input type="submit" value="submit"/>
</form>


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
	
	$name = $_POST['name'];
	if(isset($name)) {
		 $query = 'INSERT INTO `sampledb`.`User` (`name`) VALUES ("'.$name.'");';

		if ($conn->query($query) === TRUE) {
			echo "<br>Hello, " . $name . ". You are visitor #" . $visits; 
		} else {
			echo "Error: <br>" . $conn->error;
		}
	}

    
    ?>




</body>
</html>

<?php
$conn->close(); 
?>



