<?php
	include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<title>Welcome - Staff</title>
</head>
<body class="parallax">
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
          <li><a href="logout.php" class="white nav-link" style="text-decoration: none;">logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="container max-width">
  	<h2 class="display-4">Staff Welome page comes here :)</h2>
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
    </div>
    <p class="text-center">Copyright &copy <script>document.write(new Date().getFullYear())</script> - EpicSoftwares.<br>An Unauthorized and Unofficial Software Development team.</p>
    <p class="text-center">- A Beloved work with <span class="team-name">passion.</span></p>
  </div>
</body>
</html>