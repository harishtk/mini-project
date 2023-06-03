<?php
	include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<title>Welcome</title>

  <!-- <link rel="stylesheet" type="text/css" href="netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css"> -->

</head>
<body style="font-family: verdana;" class="parallax">
	<div class="jumbotron header text-center d-none">
    	<h1>This is Header.</h1>
    	<p>This is Sub-Header.</p>
  	</div>	
  	<nav class="navbar bg-blue navbar-dark sticky-top" role="navigation">
    	<div class="container-fluid">
    	    	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
        		<span class="navbar-toggler-icon"></span>
      			</button>
            <div class="navbar-header">
      			   <p class="navbar-brand white">Menu</p>
      		  </div>
      	<div class="collapse navbar-collapse" id="myNavbar">
        	<ul class="nav navbar-nav white">
          	<span class="line-br-white"></span>
          		<li class="nav-item"><a href="#" class="white nav-link">Apply Scholarship</a></li>
          		<span class="line-br-white"></span>
	          <li class="nav-item"><a href="#" class="white nav-link">Review Scholarship - (Staffs only)</a></li>
    	      <span class="line-br-white-"></span>
        	</ul>
      	</div>
      	<ul class="nav navbar-nav navbar-right">
        	  <li><a href="logout.php" class="white nav-link" style="text-decoration: none;">
        	  	<span class="glyphicon glyphicon-log-out white">Logout</span>
        	  </a></li>
      	</ul>
    	</div>
  	</nav>

  	<!-- <div class="application-container container">
  		<h1 class="text-center">Welcome! <?= $login_session ?></h1>
  		<h3 class="text-center">Student Info Form comes here :) </h3>
  	</div> -->
      <div class="container max-width">
        <div class="row justify-content-center">
          <div class="col-sm-auto text-center menu-container bottom-drop order-second">
            <h2>Student Menu</h2>
            <div class="line-br-blue"></div>
            <button type="button" class="btn-norm water-drop" aria-describedby="#apply-desc" onclick="window.location = 'application_form.php'">Apply</button>
            <small id="apply-desc">Apply for Scholarship</small>
            <div class="line-br-blue"></div>
            <button type="button" class="btn-norm water-drop" aria-describedby="#track-application" onclick="window.location = 'track_application.php'">Track</button>
            <small id="track-application">Application Status</small>
            <div class="line-br-blue"></div>
          </div>
          <div class="col-sm-8 text-center info-container">
            <h2>Student Info comes here :)</h2>

            <h4><a href="#">Not your info? click here to report.</a></h4>
            <span class="glyphicon glyphicon-envelope"></span>
            <span class="glyphicon glyphicon-comment"></span>
          </div>
        </div>
      </div>

    <footer>
    	<div class="footer white">
        <div class="row">
          <div class="col-sm white">
            <p><a href="#">Home</a></p>
            <p><a href="#">About</a></p>
            <p><a href="#">Contact Us</a></p>
          </div>
          <div class="col-sm white">
            <p><a href="#">Terms and Conditions</a></p>
            <p><a href="#">Privacy Policy</a></p>
          </div>
        </div>
        <p class="text-center">Copyright &copy <script>document.write(new Date().getFullYear())</script> - EpicSoftwares.</p>
      </div>
    </footer>
</body>
</html>