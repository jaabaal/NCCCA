<?php
session_start();
if(isset($_SESSION['login_user']))
{
?>
<html lang="en">
  <head>
    <title>Events | ADD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- TempusDominus Date and Time picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />

    <style>
      body, html{
        height:100% !important;
      }
    </style>
  </head>
  <body>

    <!-- Nav Bar Div -->
    <div class="container-fluid bg-danger">
      <div class="row py-1">
        <div class="col-md-1">
          <img src="logo.png" height="40px" width="40px"/>
        </div>
        <div class="col-md-9">
          <h3 style="color:white;">North County Climate Change Alliance</h3>
        </div>
        <div class="list-group list-group-horizontal col-md-2">
          <a class="list-group-item list-group-item-action bg-danger pt-2 text-right" href="logout.php" aria-hidden="true" style="border: none;"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a>
        </div>
      </div>
    </div>

    <hr class="m-0" style="height:2px;background-color: black;" >

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb m-3">
        <li class="breadcrumb-item active" aria-current="page">Events
      </ol>
    </nav>

    
    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-md-2">
          <div class="card">
            <div class="list-group list-group-flush">
              <a href="dashboard.php" class="list-group-item list-group-item-action bg-danger" style="color:black;"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a>
              <a href="#" class="list-group-item list-group-item-action bg-danger" style="color:black;"><i class="fa fa-user-secret" aria-hidden="true"></i>&nbsp;Admin</a>
              <a href="event.php" class="list-group-item list-group-item-action bg-danger" style="color:white;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Events</a>
              <a href="#" class="list-group-item list-group-item-action bg-danger" style="color:black;"><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp;Speakers</a>
              <a href="#" class="list-group-item list-group-item-action bg-danger" style="color:black;"><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Hosts</a>
              <a href="#" class="list-group-item list-group-item-action bg-danger" style="color:black;"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Volunteers</a>
              <a href="#" class="list-group-item list-group-item-action bg-danger" style="color:black;"><i class="fa fa-money" aria-hidden="true"></i>&nbsp;Donors</a>
              <a href="#" class="list-group-item list-group-item-action bg-danger" style="color:black;"><i class="fa fa-address-book-o" aria-hidden="true"></i>&nbsp;Contacts</a>
            </div>
          </div>
        </div>
        <!-- Main Content -->
        <div class="col-md-10 pt-1">
          <div class="card">
            <div class="card-header bg-danger" style="color:white;">Add New Event</div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                    <form action="eadd.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="eventtitle"><b>Event Title:</b></label>
                                <input type="text" class="form-control" name="eventtitle" id="eventtitle" placeholder="Enter Title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="eventtype"><b>Event Type:</b></label>
                                <select class="form-control" name="eventtype" id="eventtype" onchange="myFunc()" required>
                                  <option>Our Changing Climate Series</option>
                                  <option>NCCCA Monthly Networking Meeting</option>
                                  <option>Movie Night at The Leeds Ranch</option>
                                  <option>Fix-It Clinic at The Leeds Ranch</option>
                                  <option>Special Event</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt-2">
                                <label for="eventdescription"><b>Event Description:</b></label>
                                <textarea class="form-control" name="eventdescription" id="eventdescription" placeholder="Enter Description" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mt-2">
                                <label for="eventvenue"><b>Event Venue:</b></label>
                                <input class="form-control" name="eventvenue" id="eventvenue" required>
                            </div>
                            <div class="col-md-3 mt-2">
                              <label for="eventdate"><b>Event Date:</b></label>
                              <input type="text" class="form-control datetimepicker-input" name="eventdate" id="eventdate" data-target="#eventdate" placeholder="Enter Date" data-toggle="datetimepicker" pattern="^[0-1][0-9]/[0-3][0-9]/20[1-9][0-9]$" required>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label for="eventtime"><b>Event Time:</b></label>
                                <input type="text" class="form-control datetimepicker-input" name="eventtime" id="eventtime" data-target="#eventtime" placeholder="Enter Time" data-toggle="datetimepicker" pattern="^[0-9]?[0-9]:[0-9]{2}\s(PM|AM)$" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="eventimage"><b>Event Image:</b></label><br>
                                <input type="file" name="eventimage" style="border:1px solid lightgray;border-radius:4px;">
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6 mt-4">
                                <button type="submit" class="btn btn-success btn-block">Add Event</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Add New Event Card Ends-->
          <?php
            if($_GET["flag"]==1)
            {
          ?>
          <div class="alert alert-success alert-dismissible fade show w-100 mt-3">
              <strong>New Event created successfully!</strong>
              <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <?php
            }
          ?>
        </div>
        <!-- Main Content Ends-->
      </div>
    </div>   
    
    <!-- Footer -->
    <div class="container-fluid fixed-bottom">
      <div class="row">
        <div class="col-md-12 text-center bg-light py-2">&copy; Copyright 2019. All Rights Reserved.</div>
      </div>
    </div>

    <!-- pattern="^[0-9]?[0-9](nd|st|th|rd)\s(October|November|December)\s2019$" -->
    <!-- pattern="^[0-9]?[0-9]:[0-9]{2}\s(PM|AM)$" -->
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
   <!-- TempusDominus JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>


    <script>
      $(document).ready(function(){
        var val= document.getElementById("eventtype").value;
        if(val=="Our Changing Climate Series") 
        {
          document.getElementById("eventvenue").value="Vista Library, 700 Eucalyptus Ave, Vista-92084";
          document.getElementById("eventvenue").readOnly=true;
        }
      });

      // Function to assign default value to the venue based on the event type 
      function myFunc()
      {
        var val= document.getElementById("eventtype").value;
        if(val=="Our Changing Climate Series") 
        {
          document.getElementById("eventvenue").value="Vista Library, 700 Eucalyptus Ave, Vista-92084";
          document.getElementById("eventvenue").readOnly=true;
        }
        else if(val=="NCCCA Monthly Networking Meeting")
        {
          document.getElementById("eventvenue").value="Magee Park Community Room, 258 Beech Ave, Carlsbad-92008";
          document.getElementById("eventvenue").readOnly=true;
        }
        else if(val=="Movie Night at The Leeds Ranch" || val=="Fix-It Clinic at The Leeds Ranch")
        {
          document.getElementById("eventvenue").value="Leeds Ranch, 2251 Catalina Ave, Vista-92084";
          document.getElementById("eventvenue").readOnly=true;
        }
        else if(val=="Special Event")
        {
          document.getElementById("eventvenue").value="";
          document.getElementById("eventvenue").readOnly=false;
        }
      }
    </script>

    <script type="text/javascript">
      $(function () {
          $('#eventdate').datetimepicker({
              format: 'L'
          });
          $('#eventtime').datetimepicker({
              format: 'LT'
          });
      });
    </script>
    
  </body>
</html>
<?php
}
else
{
  header("Location: http://localhost:8888/redirect.php");
}
?>