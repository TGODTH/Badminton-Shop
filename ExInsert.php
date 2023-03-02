<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "", "ExDatabase");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$menu_name = $_REQUEST['MenuName'];
		$price = $_REQUEST['Price'];
		echo nl2br("\n$menu_name\n $price\n ");
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO menu (name,prices) VALUES ('$menu_name','$price')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully.</h3>";

			echo nl2br("\n$menu_name\n $price\n ");
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
	    header('Location: ./');
		?>
	</center>
    
</body>

</html>
