<html>
<head>
</head>
<body>
    
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "nccca";
        $uid=$_GET["uid"];
        

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $code=rand(1000,9999);
        $sqlone = "UPDATE admin SET V_code='$code'";
        $resultone = $conn->query($sqlone);
        
        $sql = "SELECT uname from admin";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) 
        {
            $row = $result->fetch_assoc(); 
            if($uid==1)
            {
                $email="jassssh@gmail.com";
            }
            else if($uid==2)
            {
                $email="shah040@cougars.csusm.edu";
            }
            $to = $email;
            $link = "http://localhost:8888/resetpass.php";
            $subject = "Your Recovered Password";
            $message = "Please click on this link to reset your password:" . $link . " .Your verification code is:".$code.". Please delete this email for security purposes.";
            $headers = "From : jassssh@gmail.com";
            mail($to, $subject, $message, $headers);
            header("Location: http://localhost:8888/forgotpass.php?flag=1"); 
            exit();
        }

        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
       
    ?>

</body>
</html>