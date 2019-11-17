<!Doctype html>
<html lang="en">
  <head>
    <title>Login</title>
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
                            <h4 class="mt-4 mx-0" style="font-family: fantasy;color:white;"><b>North County Climate Change Alliance</b></h4>
                        </div>
                        <div class="col-md-4 bg-danger">
                            <h2 class="text-center mb-3 mt-1" style="color:black;"><u>Sign In</u></h2>
                            <form action="login_test.php" method="POST">
                                <div class="form-group mb-4">
                                    <label class="sr-only" for="uname" style="color:black;">Username:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="uname" name="uname"placeholder="Enter Email..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="pword" style="color:black;">Password:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                                        </div>
                                        <input type="password" class="form-control" id="pword" name="pword" placeholder="Enter Password..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark btn-block">Login</button>
                                </div>
                            </form>
                            <h6 class="text-center mb-5"><a href="forgotpass.php" style="color:palegoldenrod;">Forgot your password?</a></h6>
                        </div>
                    </div>
                </div>
                <?php
                    if($_GET["flag"]==1)
                    {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show w-100 text-center">
                        <strong>Incorrect username or password!</strong>
                        <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <?php
                    }
                    ?>
            </div>
        </div>
    </div>

    <div class="container-fluid fixed-bottom">
      <div class="row">
        <div class="col-md-12 text-center bg-light py-2">&copy; Copyright 2019. All Rights Reserved.</div>
      </div>
    </div>

        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  </body>
</html>