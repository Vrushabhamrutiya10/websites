<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    $conn = new mysqli ("localhost","root","","login");
    if($conn->connect_error)
    {
        die("Failed to connect:".$conn->connect_error);
    }
    else
    {
        $stmt = $conn->prepare("select * from registration where username = ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows>0)
        {
            while($row = mysqli_fetch_assoc($stmt_result));
            if(password_verify($password,$hash))
            {
                echo "<script> alert('Logged In Successfully!');window.location='index.html' </script>";
            }
            else{
                echo "<script> alert('Wrong username or password!');window.location='index.html' </script>";
            }
        }
    }
?>