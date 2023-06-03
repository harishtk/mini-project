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
    <script src="dem1.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="fa/css/font-awesome.min.css">
    <title>Change Password</title>
    <script type="text/javascript">

      function goTo(url) {
        window.location = url;
      }
    
    $(document).ready(function() {
      $('#err').css("display", "none");
      var username = <?= $_SESSION['login_stud']; ?>;
      var passwd = $('passwd').val();
      var req = null;

      $('form').submit(function (evt) {
        evt.preventDefault();

        passwd = $('#passwd').val();
        $('#loading').css('display', '');

        req = $.ajax({
          url: 'database/update_passwd.php',
          method: 'post',
          data: {
            'username': username,
            'passwd': passwd
          },
          
          dataType: 'json'
        });

        req.done(function(response, textStatus, jqXHr) {
          // alert(response);
          goTo('logout.php');
          $('#loading').css('display', 'none');
        });

        req.error(function(response, error) {
          alert("Error: " + error);
          $('#loading').css('display', 'none');
        });

      });

    });
    </script>
  </head>
  <body style="font-family: verdana;" class="parallax">
    <div class="jumbotron header text-center d-none">
      <h1>This is Header.</h1>
      <p>This is Sub-Header.</p>
    </div>
    <nav class="navbar bg-blue navbar-dark sticky-top" role="navigation">
      
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php" class="white nav-link" style="text-decoration: none;">
            <span class="glyphicon glyphicon-log-out white"></span>Logout
          </a></li>
        </ul>
      </div>
    </nav>
    <div class="load-wrap text-center" style="display: none;" id="loading">
        <div class="load-3">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
        </div>  
        <p>Loading</p>
    </div>
    <div class="container">
      <h4 class="display-4 text-center text-info p-2">Change password</h4>
      <p class="text-secondary text-center p-2">For better privacy, we recommend you to change a password of your own.</p>
      <div class="form-container">

        <form method="POST">
          <div class="form-group">
            <label for="username" class="">Username</label>
            <input type="text" name="username" class="form-control form-control-main" readonly value="<?= $_SESSION['login_stud'] ?>" />
          </div>
          <div class="form-group">
            <input type="password" name="passwd" id="passwd" class="form-control form-control-main" required aria-describedby="passwdHelp" onkeyup="checkLength(this.value)">
            <label for="passwd" class="form-control-main-placeholder">New Password</label>
            <small id="usernameHelp" class="form-text text-muted">Please create a strong Password. (Atleat 8 characters)</small>
          </div>
          <div class="form-group">
            <input type="password" name="confirm-passwd" id="confirm-passwd" class="form-control form-control-main" required onkeyup="validatePassword(this.value)" />
            <label for="passwd" class="form-control-main-placeholder">Confirm Password</label>
          </div>
          <div class="form-group">
            <p id="err" class="text-danger" style="display: none;">Passwords does not match</p>
          </div>
          <div class="form-group">
            <button type="submit" id="btn-update" class="btn btn-lg btn-primary" disabled>Update</button>
          </div>
        </form>
      </div>
      <div class="load-wrap text-center" style="display: none;" id="loading">
        <div class="load-3">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
        </div>  
          <p>Loading</p>
        </div>
    </div>
    <div class="footer white">
      <div class="row">
        <div class="col-sm white">
          <p><span class="glyphicon glyphicon-home"></span><a href="logout.php">Home</a></p>
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
  <script type="text/javascript">
    function validatePassword(confirm_passwd) {
      var passwd = document.getElementById('passwd').value;

      if ( passwd != confirm_passwd ) {
        document.getElementById('btn-update').disabled = true;;
        document.getElementById('err').style.display = "";
      } else {
        document.getElementById('btn-update').disabled = false;
        document.getElementById('err').style.display = "none";
      }
    }
  </script>
</html>