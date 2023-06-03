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

		var acceptApplication_js, rejectApplication_js, updateConductCert_js = null;
		
		$(document).ready(function() {

			$(".col-md-5:odd").addClass("text-left");
			$(".col-md-5:even").addClass("text-right");

			$('#btn-accept').css("display", "none");

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
				// $("#cand-behav-impr").html(response['cand_behav_impr']);
				// $("#cand-prev-yr-attend").html(response['cand_prev_yr_attend'] == 0 ? "Not Updated" : response['cand_prev_yr_attend']);
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
					$('#form-reject-modal').submit();
				});
			});

			function rejectApplication(application_id) {
				// alert("Application has been Rejected");
				// window.location = "staff_index_lvl0.php";
			}

			$('form').submit(function (evt) {
				$('#info-text').text("Updating.. Please wait");
				evt.preventDefault();

				val = $(this).serialize();

				var req = $.ajax({
					url: 'database/update_conduct_cert.php',
					method: 'POST',
					data: val,
					dataType: 'json'
				});

				req.done(function (response, textStatus, jqXHr) {
					
					$('#info-text').text("Update Complete. Message: " + response['msg']);

					$('#btn-accept').css("display", "");
					$('#btn-update').prop("disabled", "true");
					$('form input').prop("disabled", "true");
				});

				req.error(function (error, msg) {
					alert(error + ": " + msg);
				});

			});

			$('#form-reject-modal').submit(function (evt) {
				evt.preventDefault();
		
				alert("Application is being rejected");
				var application_id = "<?= $_GET['app_id'] ?>";
				var valid_code = 2;
				var rejection_msg = $('#reject-reason-msg').val();

				// alert('<?= $_SESSION['staff_level'] ?>');
				// alert('<?= $_SESSION['login_staff'] ?>');



				req = $.ajax({
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

			acceptApplication_js = acceptApplication;
			rejectApplication_js = rejectApplication;
		});

		// function updateConductCert_js() {
		// 	alert("Data Updated!");
		// 	document.getElementById('btn-accept').disabled = false;
		// }
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
		<div class="row">
			<div class="col-lg-2 col-sm-2 col-md-2"></div>
			<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
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
							</tbody>
						</table>
						<form method="POST" action="database/update_conduct_cert.php" id="conduct-cert">
							<div class="row">
								<div class="col-md-5 form-group">
									<p>Candidate's Behaviour Impression:</p>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<input type="text" name="cand-behav-impr" class="form-control form-control-main" required placeholder="Eg. Good" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5 form-group">
									<p>Candidate's Previous Year Attendance:</p>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<input type="text" name="cand-prev-yr-attend" class="form-control form-control-main" required placeholder="Eg. 92%" />
									</div>
								</div>
							</div>
							<input type="hidden" name="application_id" value="<?= $_GET['app_id'] ?>">
							<div class="row">
								<div class="col-md-4">
								</div>
								<div class="col-md-4">
								</div>
								<div class="col-md-4">
									<button type="submit" onclick="updateConductCert_js()" class="btn btn-primary" id="btn-update" aria-describedby="#info-text"><i class="fa fa-upload"></i>Update Details</button><br>
									<small class="text-muted p-3 m-2"><span id="info-text"></span></small>
								</div>
							</div>
						</form>
							<div class="row">
								<div class="col-md-5 form-group" id="btn-accept">
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
			</div>
			<div class="col-lg-2 col-sm-2 col-md-2"></div>
		</div>
				</div>
					<div class="modal fade" id="reject-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
					 			<div class="modal-header">
					 				<h5 class="modal-title" id="exampleModalLabel">New Message</h5>
					 					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
					 			</div>
					 			<div class="modal-body">
					 	<form id="form-reject-modal">
					 		<div class="form-group">
					 			<label for="appilcation-id" class="col-form-label"><i class="fa fa-file-text-o"></i>Application Id:</label>
					 			<input type="text" class="form-control" id="appilcation-id" name="appilcation-id" readonly>
					 		</div>
					 		<div class="form-group">
					 			<label for="reject-reason-msg" class="col-form-label"><i class="fa fa-pencil-square-o"></i>Rejection Message: <small class="text-muted"> *Optional but Recommended</small></label>
					 			<textarea class="form-control" id="reject-reason-msg" name="reject-reason-msg" placeholder="Eg. _____ document is not valid"></textarea>
					 		</div>
						 </div>
						 <div class="modal-footer">
						 	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						 	<button type="submit" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"a></i>Reject Application</button>
						 </div>
					 </form>
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
	<script type="text/javascript">
		
	</script>
</html>