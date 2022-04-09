<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phoneNumber = $_POST['phoneNumber'];
	$message = $_POST['message'];

			
	$conn = new mysqli('localhost','root','','contact');
	if($conn->connect_error){
    	echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
    } 
	else {
		$stmt = $conn->prepare("INSERT INTO contactus(name,email,phoneNumber,message) VALUES (?,?,?,?)");
		$stmt->bind_param("ssis", $name, $email, $phoneNumber, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "<script> alert('Your message is successfully saved!');window.location='index.html' </script>";
				
		$stmt->close();
		$conn->close();
	}
			
?>