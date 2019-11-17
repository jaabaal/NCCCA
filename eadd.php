<html>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "nccca";
        $etitle=$_POST["eventtitle"];
        $edesc=$_POST["eventdescription"];
        $etype=$_POST["eventtype"];
        $evenue=$_POST["eventvenue"];
        $etime=$_POST["eventtime"];
        $mydate=$_POST["eventdate"];
        $eimage=$_FILES["eventimage"]["name"];

        // Escape ' error
        $edesc=str_replace("'","''",$edesc);
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        // Changing date to required date format for phpMyAdmin
        $edate=date("Y-m-d",strtotime($mydate));
        
        if($eimage=="")
        {
            $sql = "INSERT INTO event (Title,E_description,E_type,E_date,E_time,Venue,E_image,S_id,Admin_username)
            VALUES ('$etitle', '$edesc', '$etype', '$edate', '$etime', '$evenue', NULL, '3', 'admin@example.com')";
        }
        else
        {
            // Create target location for storing image
            $target = "uploads/".basename($eimage);
            // if(file_exists($target))
            // {
            //     alert("Sorry, File already exists!");
            // }
            // else{
            move_uploaded_file($_FILES["eventimage"]["tmp_name"], $target);
            $sql = "INSERT INTO event (Title,E_description,E_type,E_date,E_time,Venue,E_image,S_id,Admin_username)
            VALUES ('$etitle', '$edesc', '$etype', '$edate', '$etime', '$evenue', '$eimage', '3', 'admin@example.com')";
            // }
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: http://localhost:8888/event_add.php?flag=1"); 
            exit();
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    ?>
</body>
</html>