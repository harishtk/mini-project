	<?php
	include('session.php');
	$application_id = $_GET['app_id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/jquery.min.js"></script>
		<script src="DT.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="main.css">
		<title>Application <?= $application_id ?></title>
		<script type="text/javascript">

			var acceptApplication_js, rejectApplication_js = null;
		
		$(document).ready(function() {

			$(".col-md-5:odd").addClass("text-left");
			$(".col-md-5:even").addClass("text-right");

			function updateData(response) {

				$("#stud_name").html(response['stud_name']);
				$("#father_name").html(response['father_name']);
				$("#dept").html(response['dept']);
				$("#clg_address").html(response['clg_address']);
				$("#la_yr_course").html(response['la_yr_course']);
				$("#cu_yr_course").html(response['cu_yr_course']);
				$("#no_of_arrear").html(response['no_of_arrear']);
				$("#elig-for-scholarship").html(
					response['elig_for_scholar'] == 1 ? "Yes" : "No"
				);
				$("#elig-for-next-exam").html(
					response['elig_for_next_exam'] == 1 ? "Yes" : "No"
				);
				$("#caste").html(response['cast']);
				$("#class").html(response['class']);
				$("#temp-addr").html(response['temp_address']);
				$("#perm-addr").html(response['perm_address']);
				$("#prev-year-scholar-amt").html(response['prev_yr_scholar_amt']);
				$("#hostel-chk-in-la-year").html(response['hostel_chk_in_la_yr']);
				$("#hostel-chk-out-la-year").html(response['hostel_chk_out_la_yr']);
				$("#hostel-chk-in-cu-year").html(response['hostel_chk_in_cu_yr']);
				$("#hostel-chk-out-cu-year").html(response['hostel_chk_out_cu_yr']);
				$("#cand-behav-impr").html(response['cand_behav_impr']);
				$("#cand-prev-yr-attend").html((response['cand_prev_yr_attend'] == 0) ? "Not Updated" : response['cand_prev_yr_attend']);

				fetchUploads();
			}

			var req = $.ajax({
			url: "database/fetch_application_data.php",
			type: "POST",
			data: {
			"application_id": "<?= $application_id ?>"
			},
			dataType: "json"
			});

			req.done(function(response, textStatus, jqXHr) {
			
				updateData(response);
				// alert(response[row]['application_id']);
			});

			req.error(function(error, msg) {
			alert(error + ": " + msg);
			});

			function acceptApplication() {
				alert("Application is being processed");
				var application_id = "<?= $_GET['app_id'] ?>";
				var valid_code = 1;

				// alert('<?= $_SESSION['staff_level'] ?>');
				// alert('<?= $_SESSION['login_staff'] ?>');

				req =  $.ajax({
					url: "database/validate_application.php",
					type: "POST",
					data: {
						'application_id':application_id,
						'valid_code':valid_code,
						'staff_level': '<?= $_SESSION['staff_level'] ?>',
						'staff':'<?= $_SESSION['login_staff'] ?>'
					},
					dataType: 'json'
				});

				req.done(function (response, textStatus) {
					alert(response['msg']);
					// for ( var key in response )
					// 	alert(response[key]);

				});

				req.error(function (error, msg) {
					alert(error + ": " + msg);
				});
			}

			$("#reject-modal").on('show.bs.modal', function (event) {
				var app_id = "<?= $application_id ?>";

				var modal = $(this);
				modal.find('.modal-title').text("Reject Application: " + app_id);
				modal.find('.modal-body input').val(app_id);

				modal.find('.modal-footer .btn-primary').on('click', function (evt) {
					rejectApplication(app_id);
				});
			});

			function rejectApplication(application_id) {
				// alert("Application has been Rejected");
				// window.location = "staff_index_lvl0.php";
			}

			$('#form-reject-modal').submit(function (evt) {
				evt.preventDefault();
		
				alert("Application is being rejected");
				var application_id = "<?= $_GET['app_id'] ?>";
				var valid_code = 2;
				var rejection_msg = $('#reject-reason-msg').val();

				// alert('<?= $_SESSION['staff_level'] ?>');
				// alert('<?= $_SESSION['login_staff'] ?>');

				req =  $.ajax({
					url: "database/validate_application.php",
					type: "POST",
					data: {
						'application_id':application_id,
						'valid_code':valid_code,
						'staff_level': '<?= $_SESSION['staff_level'] ?>',
						'staff':'<?= $_SESSION['login_staff'] ?>',
						'rejection_msg':rejection_msg
					}
					// dataType: 'json'
				});

				req.done(function (response, textStatus) {
					// alert(response['msg']);
					alert(response);
					// for ( var key in response )
					// 	alert(response[key]);
				
				});

				req.error(function (error, msg) {
					alert(error + ": " + msg);
				});
			});

			function fetchUploads() {
				$('#loading').css('display', '');
				var application_id = "<?= $_GET['app_id'] ?>";

				var req = $.ajax({
					url: 'database/get_uploads.php',
					type: 'POST',
					data: {
						'appid': application_id
					},
					dataType: 'json'
				});

				req.done(function (response, textStatus) {
					// alert(response);

					$('#img-grid').empty();

					for ( var key in response['files'] ) {

						$('#img-grid').append(' <div class="row"><div class="col-md-1"></div><div class="col-md-10"><div class="col-3 m-3 "><div class="card border border-primary  shadow p-3 mb-5 bg-white rounded" style="width: 18rem"><div class="card-body bg-light"><img class="card-img" src="' + response['files'][key] + '" data-toggle="modal" data-target="#preview-img"><p class="card-text text-secondary text-center">' + key + '</p></div></div></div></div><div class="col-md-1"></div></div>');
					}

					$('#loading').css('display', 'none');

				});
			}

			$('#preview-img').on('show.bs.modal', function (evt) {
				var img = $(evt.relatedTarget);
				$(this).find('#imgpreview').attr('src', img.attr('src'));
			})


			acceptApplication_js = acceptApplication;
			rejectApplication_js = rejectApplication;
		});
		</script>
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
			<form method="POST">
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-10 col-sm-12 col-md-12 col-xs-12">
				<div class="jumbotron m-5 bg-light border border-primary rounded-15">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<h4 class="text-center mb-5">Application <?= $application_id ?></h4>
							</thead>
							<tbody>
								<tr>
									<td>Student Name:</td>
									<td id="stud_name"></td>
								</tr>
								<!-- <div class="line-br-blue"></div> -->
								<tr>
									<td>Father Name:</td>
									<td id="father_name"></td>
								</tr>
								<tr>
									<td>College Address:</td>
									<td id="clg_address"></td>
								</tr>
								<tr>
									<td>Last Year Course:</td>
									<td id="la_yr_course"></td>
								</tr>
								<tr>
									<td>Current Year Course:</td>
									<td id="cu_yr_course"></td>
								</tr>
								<tr>
									<td>Number of Arrear:</td>
									<td id="no_of_arrear"></td>
								</tr>
								<tr>
									<td>Eligible for Applying Scholarship:</td>
									<td id="elig-for-scholarship"></td>
								</tr>
								<tr>
									<td>Eligible for Next Exam:</td>
									<td id="elig-for-next-exam"></td>
								</tr>
								<tr>
									<td>Department:</td>
									<td id="dept"></td>
								</tr>
								<tr>
									<td>Caste:</td>
									<td id="caste"></td>
								</tr>
								<tr>
									<td>Class:</td>
									<td id="class"></td>
								</tr>
								<tr>
									<td>Temporary Address:</td>
									<td id="temp-addr"></td>
								</tr>
								<tr>
									<td>Permanent Address:</td>
									<td id="perm-addr"></td>
								</tr>
								<tr>
									<td>Previous Year Scholarship Amount:</td>
									<td id="prev-year-scholar-amt"></td>
								</tr>
								<tr>
									<td>Hostel Check In Last Year:</td>
									<td id="hostel-chk-in-la-year"></td>
								</tr>
								<tr>
									<td>Hostel Check Out Last Year:</td>
									<td id="hostel-chk-out-la-year"></td>
								</tr>
								<tr>
									<td>Hostel Check In Current Year:</td>
									<td id="hostel-chk-in-cu-year"></td>
								</tr>
								<tr>
									<td>Hostel Check Out Current Year (Approx):</td>
									<td id="hostel-chk-out-cu-year"></td>
								</tr>
								<tr>
									<td>Candidate's Behaviour Impression:</td>
									<td id="cand-behav-impr"></td>
								</tr>
						
								<tr>
									<td>Candidate's Previous Year Attendance:</td>
									<td id="cand-prev-yr-attend"></td>
								</tr>
							</tbody>
						</table>
					</div>
							<div class="load-wrap text-center" style="display: none;" id="loading">
		          			<div class="load-3">
		            			<div class="line"></div>
		            			<div class="line"></div>
		            			<div class="line"></div>
		          			</div>  
		          			<p>Loading Documents...</p>
		      			</div>
		      			<div class="row p-3 m-3">
		      				<h3 class="text-secondary">Attached Documents for Proof Of Identity(POI)</h3>
		      			</div>
						<div class="row p-3 m-3" id="img-grid">
							<div class="col-6">
								<div class="card" style="width: 18rem;">
									<div class="card-body">
										<img class="card-img" src="baby groot.jpg" data-toggle="modal" data-target="#preview-img">
										<p class="card-text text-secondary">Some Text</p>
									</div>
								</div>
							</div>
						</div>
						<h4 class="text-center text-dark">Click on image to magnify<i class="fa fa-search"></i></h4>
							<div class="row">
								<div class="col-md-5 form-group">
									<button class="btn-norm water-drop" onclick="acceptApplication_js()">Accept</button>
										<!-- btn btn-lg btn-outline-success -->
								</div>
								<div class="col-md-5 form-group">
									<button type="button" class="btn-norm water-drop" data-toggle="modal" data-target="#reject-modal">Reject</button>
									<!-- btn btn-lg btn-outline-danger -->
								</div>
							</div>

					
				</div>
			</div>
			<div class="col-lg-1"></div>
		</div>
	</form>
		</div>
				
		<div class="modal fade" id="preview-img" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
				<div class="modal-content" style="background-color: transparent; border: none;">
					<!-- <div class="modal-header">
						<h5 class="modal-title">Image preview</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div> -->
					<div class="modal-body text-center">
						<img src="" id="imgpreview" style="width: 50vw; height: 90vh;">
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="reject-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					 <div class="modal-header">
					 	<h5 class="modal-title" id="exampleModalLabel">New Message</h5>
					 	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					 </div>
					 <div class="modal-body">
					 	<form id="form-reject-modal">
					 		<div class="form-group">
					 			<label for="appilcation-id" class="col-form-label">Application Id:</label>
					 			<input type="text" class="form-control" id="appilcation-id" name="appilcation-id" readonly>
					 		</div>
					 		<div class="form-group">
					 			<label for="reject-reason-msg" class="col-form-label">Rejection Message: <small class="text-muted"> *Optional but Recommended</small></label>
					 			<textarea class="form-control" id="reject-reason-msg" name="reject-reason-msg" placeholder="Eg. _____ document is not valid"></textarea>
					 		</div>
					 	</form>
					 </div>
					 <div class="modal-footer">
					 	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					 	<button type="button" class="btn btn-primary" data-dismiss="modal">Reject Application</button>
					 </div>
				</div>
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
</html>