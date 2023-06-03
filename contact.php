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
  <script type="text/javascript">
     function goTo(url) {
        window.location = url;
      }
  </script>
</head>
<body style="font-family: verdana;" class="parallax">
	<div class="jumbotron header text-center d-none">
    	<h1>This is Header.</h1>
    	<p>This is Sub-Header.</p>
  	</div>	
  	<nav class="navbar bg-blue navbar-dark sticky-top" role="navigation">
    	<div class="container-fluid">
	      	<div class="navbar-header">
    	    	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
        		<span class="navbar-toggler-icon white"></span>
      			</button>
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

  	<div class="container max-width">
  		<h1 class="text-center">Welcome!</h1>
  		<h3 class="text-left">Contact Us:</h3>
      <button class="btn-norm water-drop" onclick="goTo('index.php')">Home</button>
  	</div>

  	<div class="footer white">
    <div class="row">
      <div class="col-sm white">
        <p><a href="index.php">Home</a></p>
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
</body>
</html>