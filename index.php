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
    <title>Welcome</title>
    <script type="text/javascript">
    function goTo(url) {
    window.location = url;
    }
    
    $(document).ready(function() {
    var username = <?= $_SESSION['login_stud']; ?>;
    var application_id = null;
    var req = null;
    $('#loading').css('display', '');
    req = $.ajax({
    url: 'database/fetch_stud_info.php',
    method: 'post',
    data: {
    'username': username
    },
    dataType: 'json'
    });
    function updateStudInfo(response) {
      

    if ( response['err'] ) {
    alert(response['err']);
    } else {
    $("#reg_no").html(response['reg_no']);
    $("#h-name").html(response['name']);
    $("#name").html(response['name']);
    $("#dept").html(response['dept']);
    $("#dob").html(response['dob']);
    $("#course_dur").html(response['course_dur']);
    $("#blood_grp").html(response['blood_grp']);
    // alert(response['application_id']);
    // alert(response['is_rejected'] == false ? "Not Available" : "Available");
    // if ( response['application_available'] != "" )
    //   alert(response['application_id']);
    // else
    //   alert(response['application_id']);
    //
    
    if ( response['application_available'] ) {
    $('#nav-apply').css("display", "none");
    if ( response['is_rejected'] == 1 ) {
    $('#applicaiton-rejected').css("display", "");
    $('#nav').css("display", "none");
    $('#msg-trigger').attr('data-appid', response['application_id']);
    }
    }
    if ( response['password_changed'] == 0 ) {
    goTo('change_password.php');
    }
    }
    
    $('#loading').css('display', 'none');
    }
    req.done(function(response, textStatus, jqXHr) {
    
    updateStudInfo(response);
    });
    req.error(function(response, error) {
    alert("Error: " + error);
    });
    $('#modal-reject-msg').on('show.bs.modal', function (evt) {
    var app_id = $(evt.relatedTarget).data('appid');
    $(this).find('#modal-title').text("Application Id: " + app_id);
    });
    });
    </script>
  </head>
  <body style="font-family: Google Sans;" class="parallax">
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
    <!-- <div class="application-container container">
      <h1 class="text-center">Welcome!</h1>
      <h3 class="text-center">Student Info Form comes here :) </h3>
    </div> -->
    <!-- <div class="container max-width">
      <div class="row justify-content-center">
        <div class="col-sm-auto text-center menu-container bottom-drop order-second">
          <h2>Student Menu</h2>
          <div class="line-br-blue"></div>
          <button type="button" class="btn-norm water-drop" aria-describedby="#apply-desc">Apply</button>
          <small id="apply-desc">Apply for Scholarship</small>
          <div class="line-br-blue"></div>
          <button type="button" class="btn-norm water-drop" aria-describedby="#track-application">Track</button>
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
    </div>-->
    <div class="container max-width water-drop">
      <div class="load-wrap text-center" style="display: none;" id="loading">
        <div class="load-3">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
        </div>
        <p>Loading</p>
      </div>
      <div class="container stud-profile">
        <div class="row p-2">
          <!-- <div class="col-md-4">
            <div class="profile-img">
              <img src="user.png"  alt=""/>
            </div>
          </div> -->
          <div class="col text-center p-4">
            
            <h5 id="h-name">
            NAVINKUMAR.S
            </h5>
            <h6 class="text-muted id="reg_no">
            164129
            </h6>
          </div>
        </div>
        <div class="row justify-content-center profile-head">
          <div class="col" style="font-size: xx-large; font-weight: lighter;">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
              <li class="nav-item mx-5">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
              </li>
              <li class="nav-item mx-5">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Info</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col text-center ">
            <div class="tab-content profile-tab" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row text-center p-3 m-3">
                  <div class="col">
                    <label>Name:</label>
                  </div>
                  <div class="col text-left">
                    <p id="name">NAVINKUMAR.S</p>
                  </div>
                </div>
                <div class="row  p-3 m-2">
                  <div class="col">
                    <label><i class="fa fa-share-alt"></i>Branch:</label>
                  </div>
                  <div class="col text-left">
                    <p id="dept">cse/reg</p>
                  </div>
                </div>
                <div class="row  p-3 m-2">
                  <div class="col-md-6">
                    <label><i class="fa fa-calendar"></i>Year:</label>
                  </div>
                  <div class="col text-left">
                    <p id="course_dur">2016-2019</p>
                  </div>
                </div>
                <div class="row  p-3 m-2">
                  <div class="col-md-6">
                    <label><i class="fa fa-envelope"></i>Email:</label>
                  </div>
                  <div class="col text-left">
                    <p id="email">******@gmail.com</p>
                  </div>
                </div>
                <div class="row  p-3 m-2">
                  <div class="col-md-6">
                    <label></label>
                  </div>
                  <div class="col-md-6">
                    <p></p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row  p-3 m-2">
                  <div class="col-md-6">
                    <label><i class="fa fa-calendar-o"></i>DOB:</label>
                  </div>
                  <div class="col text-left">
                    <p id="dob">00/00/0000</p>
                  </div>
                </div>
                
                <div class="row p-3 m-2">
                  <div class="col-md-6">
                    <label><span class="glyphicon glyphicon-tint"></span>Blood Group: </label>
                  </div>
                  <div class="col text-left">
                    <p id="blood_grp">2</p>
                  </div>
                </div>
                <div class="row  p-3 m-2">
                  <div class="col-md-6">
                    <label>Reg No:</label>
                  </div>
                  <div class="col text-left">
                    <p id="reg_no">ENGLISH</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center text-center" id="nav">
          <div class="col-sm-6" id="nav-apply">
            <button class="btn-big water-drop" aria-describedby="#apply-desc" onclick="goTo('application_form.php')"><i class="fa fa-pencil"></i>Apply</button>
            <small id="apply-desc">Apply for Scholarship</small>
          </div>
          <div class="col-sm-6" id="nav-track">
            <button class="btn-big water-drop" aria-describedby="#track-application" onclick><i class="fa fa-search"></i>Track</button>
            <small id="track-application">Application Status</small>
          </div>
        </div>
        <div class="row justify-content-center text-center" id="applicaiton-rejected" style="display: none;">
          <div class="col-sm">
            <button class="btn-big water-drop" aria-describedby="#reject-msg" disabled>Application Rejected!</button>
            <small id="reject-msg"><a href="#" id="msg-trigger" data-toggle="modal" data-target="#modal-reject-msg" data-appid="example" class="text-danger bolder" style="text-decoration: none">Tell Me What Happened</a></small>
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="modal-reject-msg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-title">Demo title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">I Understand</button>
          </div>
        </div>
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
          <p><span class="glyphicon glyphicon-home"></span><a href="#">Home</a></p>
          <p><span class="glyphicon glyphicon-info-sign"></span><a href="#">About</a></p>
          <p><span class="glyphicon glyphicon-earphone"></span><a href="#">Contact Us</a></p>
        </div>
        <div class="col-sm white">
          <p><a href="#">Terms and Conditions</a></p>
          <p><a href="#">Privacy Policy</a></p>
        </div>
      </div>
      <p class="text-center">Copyright <i class="fa fa-copyright"></i> <script>document.write(new Date().getFullYear())</script> - EpicSoftwares.</p>
    </div>
  </body>
</html>