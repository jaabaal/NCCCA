<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "nccca";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="SELECT V_code FROM admin";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
$code=$row["V_code"];
?>
<!Doctype html>
<html lang="en">
  <head>
    <title>Reset Password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
      body, html{
        height:100% !important;
      }
    </style>
  </head>
  <body>

    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-md-12 mx-auto">
                <div class="jumbotron p-4">
                    <div class="row m-0">
                        <div class="col-md-8 bg-dark text-center">
                            <img class="mt-2" src="logo.png" height="200" width="200" alt="">
                            <h4 class="mt-4 mx-0 pb-3" style="font-family: fantasy;color:white;"><b>North County Climate Change Alliance</b></h4>
                        </div>
                        <div class="col-md-4 bg-danger">
                            <h2 class="text-center mb-3 mt-2" style="color:black;"><u>Reset Password</u></h2>
                            <form action="reset_test.php" method="POST">
                                <div class="form-group mb-4">
                                    <label class="sr-only" for="pword" style="color:black;">New Password:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend mt-2">
                                            <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                                        </div>
                                        <input type="password" class="form-control mt-2" id="pword" name="pword" placeholder="Enter New Password..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="cpword" style="color:black;">Password:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                                        </div>
                                        <input type="password" class="form-control" id="cpword" name="cpword" placeholder="Confirm New Password..." required>
                                        <span id="message"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark btn-block">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>
    $(document).ready(function()
    {
        var code=prompt("Enter the verification code:");
        if(code!='<?php echo $code?>')
        {
            window.location.replace("http://localhost:8888/redirect.php");
        }
    });

    $('#pword', '#cpword').on('keyup', function(){
    if ($('#pword').val() == $('#cpword').val())
    {
    $('#message').html('Matching').css('color', 'green');
    } else 
    $('#message').html('Not Matching').css('color', 'red');
    });
    </script>
  </body>
</html>