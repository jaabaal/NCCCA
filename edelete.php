<html>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "nccca";
        $eid=$_GET["eid"];
        $status=$_GET["status"];
    
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "UPDATE event SET E_status='$status' WHERE E_id='$eid'";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: http://localhost:8888/event.php?flag=2"); 
            exit();
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    ?>
</body>
</html>