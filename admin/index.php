<!-- <?php
// include('session.php');
?> -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="dem1.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../main.css">
    <link rel="stylesheet" type="text/css" href="../fa/css/font-awesome.min.css">
    <title>Welcome</title>
    <script type="text/javascript">
    function goTo(url) {
    window.location = url;
    }
    
    $(document).ready(function() {
    });
    </script>
  </head>
  <body style="font-family: verdana;" class="parallax">
    <div class="jumbotron header text-center d-none">
      <h1>This is Header.</h1>
      <p>This is Sub-Header.</p>
    </div>
    <nav class="navbar bg-blue navbar-dark sticky-top" role="navigation">
      <div class="container-fluid">
        <button type="button" class="navbar-toggler text-light" data-toggle="collapse" data-target="#myNavbar">
        <!-- <span class="glyphicon glyphicon-align-justify"></span> --><i class="fa fa-bars"></i>
        </button>
        <div class="navbar-header">
          <p class="navbar-brand white"><!-- <i class="fa fa-user"></i> -->Menu</p>
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
            <span class="glyphicon glyphicon-log-out white"></span>Logout
          </a></li>
        </ul>
      </div>
    </nav>
    <div class="container max-width">
      <div class="load-wrap text-center" style="display: none;" id="loading">
        <div class="load-3">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
        </div>
        <p>Loading</p>
      </div>
    </div>
    <div class="jumbotron">
      <h4 class="text-center text-dark">Welcome Admin</h4>
    </div>
    <div class="footer white">
      <div class="row">
        <div class="col-sm white">
          <p><span class="glyphicon glyphicon-home"></span><a href="#">Home</a></p>
          <p><span class="glyphicon glyphicon-info-sign"></span><a href="#">About</a></p>
          <p><span class="glyphicon glyphicon-earphone"></span><a href="#">Contact Us</a></p>
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