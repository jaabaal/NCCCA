<html>
<head>
</head>
<body>
    
    <?php
        // Starting a new session
        session_start();
       
        if (empty($_POST['uname']) || empty($_POST['pword'])) 
        {
            echo "Username or Password is invalid!";
        }
        else
        {
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "nccca";
            $uname=$_POST["uname"];
            $pword=$_POST["pword"];

            $pword=md5($pword);
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            $sql = "SELECT * from admin";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    if($row["uname"]==$uname and $row["pword"]==$pword)
                    {
                        $_SESSION['login_user']=$uname;
                        header("Location: http://localhost:8888/dashboard.php"); 
                        exit();
                    }

                    else 
                    {
                        header("Location: http://localhost:8888/login.php?flag=1"); 
                        exit();
                    }
                }
            }

            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
       
    ?>

</body>
</html>