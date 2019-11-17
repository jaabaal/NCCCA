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
        $eid=$_GET["eid"];
        $eimage=$_FILES["eventimage"]["name"];
        
        // Escape ' error
        $edesc=str_replace("'","''",$edesc);
    
        // Changing date to required date format for phpMyAdmin
        $edate=date("Y-m-d",strtotime($mydate));

        // Create target location for storing image
        $target = "uploads/".basename($eimage);
        move_uploaded_file($_FILES["eventimage"]["tmp_name"], $target);
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sqlone="SELECT * FROM event WHERE E_id='$eid'";
        $result = $conn->query($sqlone);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            if($eimage=="" && $etime!="")
            {
                $sql = "UPDATE event SET Title='$etitle',E_description='$edesc',E_type='$etype',E_date='$edate',E_time='$etime',Venue='$evenue',S_id='3',Admin_username='admin@example.com' WHERE E_id='$eid'";
            }
            else if($eimage!="" && $etime=="")
            {
                $sql = "UPDATE event SET Title='$etitle',E_description='$edesc',E_type='$etype',E_date='$edate',Venue='$evenue',E_image='$eimage',S_id='3',Admin_username='admin@example.com' WHERE E_id='$eid'";
            }
            else if($eimage=="" && $etime=="")
            {
                $sql = "UPDATE event SET Title='$etitle',E_description='$edesc',E_type='$etype',E_date='$edate',Venue='$evenue',S_id='3',Admin_username='admin@example.com' WHERE E_id='$eid'";
            }
            else
            {
                $sql = "UPDATE event SET Title='$etitle',E_description='$edesc',E_type='$etype',E_date='$edate',E_time='$etime',Venue='$evenue',E_image='$eimage',S_id='3',Admin_username='admin@example.com' WHERE E_id='$eid'";
            }
            if ($conn->query($sql) === TRUE) {
                header("Location: http://localhost:8888/event.php?flag=1"); 
                exit();
            }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        

    ?>
</body>
</html>