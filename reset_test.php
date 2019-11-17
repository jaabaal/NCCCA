<html>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "nccca";
        $pword=$_POST["pword"];
        
        $pword=md5($pword);
        // if($pword===$cpword)
        // {
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            $sql="UPDATE admin SET pword='$pword' WHERE uname='admin@example.com'";
            if ($conn->query($sql) === TRUE) {
                header("Location: http://localhost:8888/login.php"); 
                exit();
            }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        // }

    ?>
</body>
</html>