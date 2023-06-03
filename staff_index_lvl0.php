<?php
  include('session.php');

  date_default_timezone_set("Asia/Calcutta");
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
    }
    li {
      float: left;
    }
    li a {
      display: inline-block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.min.js"></script>
    <script src="DT.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Welcome - Staff</title>
    <script type="text/javascript">
    
    $(document).ready(function() {

      function showApplications(response) {
        // $("#table-body").empty();
        // for(var row in response){
        //   if ( response.hasOwnProperty(row) )
        //     for(var key in response[row]) {
        //     // alert("Key: " + key + "---- Value: " + response[row][key]);
        //       $("#table-body").append('<tr><th scope="row">' + response[row]['application_id'] + '</th><td> ' + response[row]['submitted_on'] + '</td><td>Pending</td><td><input class="btn-norm water-drop" type="submit" value="Review" application="' + response[row]['application_id'] + '" onclick="reviewApplication(this)"></td></tr>');
        //       break;
        //     }
        //   }
        // if ( $("#table-body").children().length <= 0 )
        //   $("#empty-msg").css("display", "");
        
        $("#application-grid").empty();

        for ( var row in response ) {
          if ( response.hasOwnProperty(row) )
            for ( var key in response[row] ) {

              $("#application-grid").append('<div class="col-sm-3"><div class="card"><div class= "card-body"><h5 class="card-title">' + response[row]['application_id'] + '</h5><p class="card-text">Submitted On: ' + response[row]['submitted_on'] + ' </p><p class="text-muted">Pending</p><input type="button" class="btn btn-primary" application="' + response[row]['application_id'] + '" onclick="reviewApplication(this)" value="Review Application" /> </div></div></div>');

                break;
            } 
        }
          
        if ( $("#application-grid").children().length <= 0 )
          $("#empty-msg").css("display", "");
      }
    
      var req = $.ajax({
        url: "database/fetch_application.php",
        type: "POST",
        data: {
        "level": <?= $_SESSION['staff_level']; ?>
        },
        dataType: "json"
      });

      req.done(function(response, textStatus, jqXHr) {
      
      // alert(textStatus + ": " + response);   ;
        $("#loading").css("display", "none");
        showApplications(response);
      });

      req.error(function(error, msg) {
        alert(error + ": " + msg);
      });

    });

    function reviewApplication(ele) {

      var app_id = ele.getAttribute("application");
        
      if ( confirm("Going to review: " + app_id) )
        window.location.href = "form_review_lvl0.php?app_id=" + app_id;
      else
        return;
    }
    </script>
  </head>
  <body class="parallax" onload="initLoading()">
    <div class="jumbotron header text-center d-none">
      <h1 class="display-4">This is Header.</h1>
      <p>This is Sub-Header.</p>
    </div>
    <nav class="navbar bg-blue navbar-dark white sticky-top" role="navigation">
      <div class="container-fluid">
        <button type="button" class="navbar-toggler white" data-toggle="collapse"
        data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-header">
          <a class="navbar-brand white" href="#">Menu</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav white">
            <span class="line-br-white"></span>
            <li class="nav-item"><a href="#" class="white nav-link">Apply Scholarship</a></li>
            <span class="line-br-white"></span>
            <li class="nav-item"><a href="#" class="white nav-link">Review Scholarship - (Staffs only)</a></li>
            <span class="line-br-white"></span>
          </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php" class="white nav-link" style="text-decoration: none;"><i class="glyphicon glyphicon-user"></i>logout</a></li>
        </ul>
      </div>
    </nav> 

      <!-- <div class="tab">
        <div class="row">
          <div class="col">
            <div><h4>NatrajanShivan</h4></div>
          </div>
          <div class="col">
            <div><h4>staff</h4></div>
          </div>
          <div class="col">
            <div><h4>Welcome Sir</h4></div>
          </div>
        </div>
      </div> -->

    

    <div class="container max-width">
      <div class="load-wrap text-center" style="display: none;" id="loading">
          <div class="load-3">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
          </div>  
          <p>Loading</p>
      </div>
       
     <!--  <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Application Id</th>
            <th scope="col">Submitted On</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody id="table-body">
          <tr>
            <th scope="row">11</th>
            <td >27-jan-2019</td>
            <td>Pending</td>
            <td><input class="btn-norm water-drop" type="submit" value="review"></td>
          </tr>
          <tr>
            <th scope="row">12</th>
            <td>27-jan-2019</td>
            <td>Pending</td>
            <td><input type="submit" value="review"></td>
          </tr>
          <tr>
            <th scope="row">13</th>
            <td>27-jan-2019</td>
            <td>Pending</td>
            <td><input type="submit" value="review"></td>
          </tr>
        </tbody>
      </table> -->
      
     <!--  <div class="display-5 text-center" id="empty-msg" style="display: none;">
        No Applications Available Yet!
      </div> -->
    </div>
  
      <div class="row application-grid" id="application-grid"> 
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="display-5 card-title">DCE174202</h5>
              <p class="card-text">Submitted On - <?= date("d-m-Y H:i") ?><p class="text-muted">Pending</p></p>
              <a href="" class="btn btn-primary">Review Application</a>
            </div>  
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="display-5 card-title">DCE174202</h5>
              <p class="card-text">Submitted On - <?= date("d-m-Y H:i") ?><p class="text-muted">Pending</p></p>
              <a href="" class="btn btn-primary">Review Application</a>
            </div>  
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="display-5 card-title">DCE174202</h5>
              <p class="card-text">Submitted On - <?= date("d-m-Y H:i") ?><p class="text-muted">Pending</p></p>
              <a href="" class="btn btn-primary">Review Application</a>
            </div>  
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="display-5 card-title">DCE174202</h5>
              <p class="card-text">Submitted On - <?= date("d-m-Y H:i") ?><p class="text-muted">Pending</p></p>
              <a href="" class="btn btn-primary">Review Application</a>
            </div>  
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="display-5 card-title">DCE174202</h5>
              <p class="card-text">Submitted On - <?= date("d-m-Y H:i") ?><p class="text-muted">Pending</p></p>
              <a href="" class="btn btn-primary">Review Application</a>
            </div>  
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="display-5 card-title">DCE174202</h5>
              <p class="card-text">Submitted On - <?= date("d-m-Y H:i") ?><p class="text-muted">Pending</p></p>
              <a href="" class="btn btn-primary">Review Application</a>
            </div>  
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="display-5 card-title">DCE174202</h5>
              <p class="card-text">Submitted On - <?= date("d-m-Y H:i") ?><p class="text-muted">Pending</p></p>
              <a href="" class="btn btn-primary">Review Application</a>
            </div>  
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="display-5 card-title">DCE174202</h5>
              <p class="card-text">Submitted On - <?= date("d-m-Y H:i") ?><p class="text-muted">Pending</p></p>
              <a href="" class="btn btn-primary">Review Application</a>
            </div>  
          </div>
        </div>
      </div>

       <div class="row application-grid">
        <div class="col-sm-4">
          
        </div>
        <div class="col-sm-4">
          <div class="card" id="empty-msg" style="display: none;">
            <div class="card-header">
              Info
            </div>
            <div class="card-body text-center ">
              <p class="card-text">No applications available!</p>
              <p class="text-secondary"><span><i class="fa fa-info-circle"></i></span>As soon as the application submitted, will appear here. Now take a cup of <i class="fa fa-coffee"></i></p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          
        </div>
      </div>
     <div class="card">
       <div class="card-body">
         <h5 class="card-text">Viewing this page on: <?= date("l, j M y g:i A") ?> </h5>
       </div>
     </div>
    <div class="footer white">
      <div class="row">
        <div class="col-sm white">
          <p><a href="index.php" data-toggle="tooltip" data-placement="top" title="Go to Home!">Home</a></p>
          <p><a href="about.php">About</a></p>
          <p><a href="contact.php">Contact Us</a></p>
        </div>
        <div class="col-sm white">
          <p><a href="#">Terms and Conditions</a></p>
          <p><a href="#">Privacy Policy</a></p>
        </div>
        <div class="clock">
          <div id="Date"></div>
          <ul>
            <li id="hours"></li>
            <li id="point">:</li>
            <li id="min"></li>
            <li id="point">:</li>
            <li id="sec"></li>
          </ul>
        </div>
      </div>
      <p class="text-center">Copyright &copy <script>document.write(new Date().getFullYear())</script> - EpicSoftwares.<br>An Unauthorized and Unofficial Software Development team.</p>
      <p class="text-center">- A Beloved work with <span class="team-name">passion.</span></p>
    </div>
  </body>
  <script type="text/javascript">
  function initLoading() {
    document.getElementById("loading").style.display = "";
  }
  </script>
</html>