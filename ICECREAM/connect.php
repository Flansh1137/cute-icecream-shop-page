<?php

error_reporting() ;

	$name = $_POST['name'];
	$DOB = $_POST['DOB'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into regestrion(name, DOB, phone, email, password ) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("siiss", $name, $DOB, $phone ,$email, $password );
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
