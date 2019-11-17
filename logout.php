<html>
<body>
    <?php
        session_start();
        if(isset($_SESSION['login_user']))
        {
            session_destroy();
            unset($_SESSION['login_user']);
            header("Location: http://localhost:8888/login.php"); 
            exit();
        }
        else
        {
            header("Location: http://localhost:8888/redirect.php"); 
            exit();
        }
    ?>
</body>
</html>