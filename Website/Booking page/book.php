<?php

$fullname = $_POST['fullname'];
$phonenumber = $_POST['phonenumber'];
$address = $_POST['address'];
$service= $_POST['service'];
$vendor = $_POST['vendor'];
$email = $_POST['email'];
$pincode = $_POST['pincode'];
$date = $_POST['date'];
$payment = $_POST['payment'];

    $conn = new mysqli('localhost','root','','booking');
	if($conn->connect_error){
    	echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
    }
    else {
        $stmt = $conn->prepare("INSERT INTO bookingpage(fullname,phonenumber,address,service,vendor,email,pincode,date,payment) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sissssiss", $fullname,$phonenumber,$address,$service,$vendor,$email,$pincode,$date,$payment);
        $execval = $stmt->execute();
        echo $execval;
        echo "<script> alert('Booked Successfully');window.location='BookingDetailsfinal.html' </script>";
                    
        $stmt->close();
        $conn->close();
    }
?>



