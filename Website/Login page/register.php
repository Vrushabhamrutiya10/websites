<!DOCTYPE html>
<html>
	<head>
    	<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
	
		<?php
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$hash = password_hash($password, PASSWORD_DEFAULT);

			
			$conn = new mysqli('localhost','root','','login');
			if($conn->connect_error){
				echo "$conn->connect_error";
				die("Connection Failed : ". $conn->connect_error);
			} 
			else {
				$stmt = $conn->prepare("INSERT INTO registration(username,email,password) VALUES (?,?,?)");
				$stmt->bind_param("sss", $username, $email, $hash);
				$execval = $stmt->execute();
				echo $execval;
				echo "<script> alert('Thankyou for Registering!');window.location='index.html' </script>";
				
				$stmt->close();
				$conn->close();
			}
			
		?>
	</body>
</html>