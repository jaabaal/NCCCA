<?php
session_start();
if(isset($_SESSION['login_user']))
{
?>
<html lang="en">
  <head>
    <title>Events</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
   

    <style>
      body, html{
        height:100% !important;
      }
    </style>
  </head>
  <body>

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
    } ?>

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
          <?php
            if($_GET["flag"]==1)
            {
          ?>
          <div class="alert alert-success alert-dismissible fade show w-100 mt-3">
              <strong>Event Updated successfully!</strong>
              <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <?php
            }
            else if($_GET["flag"]==2)
            {
          ?>
          <div class="alert alert-danger alert-dismissible fade show w-100 mt-3">
              <strong>Event Deleted successfully!</strong>
              <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <?php
            }
          ?>
        </div>
        <!-- Main Content -->
        <div class="col-md-10 pt-1">
          <div class="card">
            <div class="card-body">
              <a href="event_add.php" class="btn btn-outline-dark btn-block" role="button">ADD NEW EVENT</a>
            </div>
          </div>
          <div class="card mt-3" style="margin-bottom:50px;">
            <div class="card-header bg-danger" style="color:white;">Events</div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <?php
                    // $todaydate=date("Y-m-d",strtotime("-1 days"));
                    $sql = "SELECT * FROM event WHERE E_status=1";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                  ?>
                  <table class="table table-striped" id="myTable">
                    <thead>
                      <tr>
                        <th scope="col">Event ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Venue</th>
                        <th scope="col">Image</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody style="text-align:center;">
                    <?php
                    // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                    ?> 
                      <tr>
                        <th><?php echo $row["E_id"]?></th>
                        <td><?php echo $row["Title"]?></td>
                        <td><?php echo str_replace("''","'",$row["E_description"])?></td>
                        <td><?php echo $row["E_type"]?></td>
                        <td><?php echo date("m/d/Y",strtotime($row["E_date"]))?></td>
                        <td><?php echo $row["E_time"]?></td>
                        <td ><?php echo $row["Venue"]?></td>
                        <?php
                         if($row["E_image"]==NULL)
                         {
                        ?>
                        <td >Not assigned</td>
                        <?php
                         }
                        else
                        {
                        ?>
                        <td><?php echo $row["E_image"]?></td>
                        <?php
                        }
                        ?>
                        <td><a href="event_edit.php?eid=<?php echo $row["E_id"]?>" class="btn btn-success" role="button"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#" class="btn btn-danger" id="mydel" role="button" onclick="myDel(<?php echo $row['E_id']?>)"><i class="fa fa-remove"></i></a></td>
                      </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                  </table>
                  <?php
                  }
                  else {
                    echo "No Results to display!";
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <!-- Speakers Card Ends-->
        </div>
        <!-- Main Content Ends-->
      </div>
    </div>   
               
     
  
    
    <!-- Footer -->
    <div class="container-fluid mt-3" style="position: fixed;left: 0;bottom: 0;width: 100%;">
      <div class="row">
        <div class="col-md-12 text-center bg-light py-2">&copy; Copyright 2019. All Rights Reserved.</div>
      </div>
    </div>
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    
    <script>
    $(document).ready(function()
    {
    $('#myTable').dataTable(
      {
        "columnDefs": 
        [
            {
                "render": function ( data, type, row ) {
                    return type=='display' && data.length > 13 ?
                    data.substr( 0, 13 ) + '...<a href="event_edit.php?eid='+ row[0] +'" role="button">read more</a>':
                    data;
                },
                "targets": 2
            }
        ]
    }
    )
    });

    function myDel(id)
    {
      var val=confirm("Are you sure you want to delete this record?");
      if(val===true)
      {
        document.getElementById("mydel").href="edelete.php?eid="+ id +"&status=0";
        window.location.href="edelete.php?eid="+ id +"&status=0";
      }
      else
      {

      }
    }
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