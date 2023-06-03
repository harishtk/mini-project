<!DOCTYPE html>
<html>
	<head>
		<title>Application Form</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="main.css">
		<script type="text/javascript">
			$(document).ready(function () {
				$(document).find('input').addClass('form-control');
				$(document).find('textarea').addClass('form-control');

				$('#student-details-form').submit(function (evt) {
					$(this).submit();
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
						<li class="nav-item"><a href="#" class="white nav-link menu">Apply Scholarship</a></li>
						<span class="line-br-white"></span>
						<li class="nav-item"><a href="#" class="white nav-link menu">Review Scholarship - (Staffs only)</a></li>
						<span class="line-br-white-"></span>
					</ul>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php" class="white nav-link" style="text-decoration: none;">
						Logout
					</a></li>
				</ul>
			</div>
		</nav>
		<div class="jumbotron p-3 m-5 bg-light border border-primary rounded-15">
			<form id="student-details-form" method="POST" action="database/application_submitter.php">
				<div class="text-center">
					<span class="display-4 text-primary">Application Form</span>
				</div>
				<div class="p-2 m-2 text-secondary">
					Student Details
				</div>
				<div class="form-group-lg">
					<label for="stud_name">Student Name</label>
					<input type="text" name="stud_name" />
				</div>
				<div class="form-group-lg">
					<label for="father_name">Father Name</label>
					<input type="text" name="father_name" />
				</div>
				<div class="form-group-lg">
					<label for="stud_name">Caste</label>
					<input type="text" name="cast" />
				</div>
				<div class="form-group-lg">
					<select class="custom-select cust" name="class">
						<option disabled selected>Choose Class</option>
						<option value="BC">BC</option>
						<option value="MBC">MBC</option>
						<option value="AC">AC</option>
						<option value="DC/BC">DC/BC</option>
					</select>
				</div>
				<div class="form-group-lg">
					<label for="temp_address">Temporary Address</label>
					<textarea class="form-control" name="temp_address"></textarea>
				</div>
				<div class="form-group-lg">
					<label for="perm_address">Permanent Address</label>
					<textarea class="form-control" name="perm_address"></textarea>
				</div>
				<div class="form-group-lg">
					<label for="email">Email</label>
					<input type="text" name="email" />
				</div>
				<div class="p-2 m-2 text-secondary">
					Academic Details
				</div>
				<div class="form-group-lg">
					<select class="custom-select cust" name="dept" id="sel_dept">
						<option disabled selected>LastYearCourse</option>
						<option value="Computer Science Engineering">Computer Sciense Engineering</option>
						<option value="Civil Engineering">Civil</option>
						<option value="Mechanical Engineering">Mechanical Engineering</option>
						<option value="Polymer Technology">Polymer</option>
						<option value="Plastic Technology">Plastic</option>
						<option value="Electrical and Electronics Engineering">Electrical And Electronical Engineering</option>
					</select>
				</div>
				<div class="form-group-lg">
					<label for="no_of_arrear">Number of Arrears</label>
					<input type="text" name="no_of_arrear" />
				</div>
				<div class="form-group-lg">
					<select class="custom-select cust" name="dept" id="sel_dept">
						<option disabled selected>Select Department</option>
						<option value="Computer Science Engineering">Computer Sciense Engineering</option>
						<option value="Civil Engineering">Civil</option>
						<option value="Mechanical Engineering">Mechanical Engineering</option>
						<option value="Polymer Technology">Polymer</option>
						<option value="Plastic Technology">Plastic</option>
						<option value="Electrical and Electronics Engineering">Electrical And Electronical Engineering</option>
					</select>
				</div>
				<div class="form-group-lg">
					<label for="clg_address">College Address</label>
					<textarea class="form-control" name="clg_address"></textarea>
				</div>
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-10">
						<label name="elig_for_scholar" id="redio_eligi_schl">Eligibility For Scholarship:</label>
						<div class="custom-control custom-radio">
							<input type="radio" name="elig_for_scholar" class="custom-control-input" id="radio-eligi-yes">
							<label class="custom-control-label" for="radio-eligi-yes">Yes</label>
						</div>
						<div class="custom-control custom-radio">
							<input type="radio" class="custom-control-input" name="elig_for_scholar" id="radio-eligi-no">
							<label class="custom-control-label" for="radio-eligi-no">No</label>
						</div>
					</div>
					<div class="col-lg-1"></div>
				</div>
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-10">
						<label name="elig_for_next_exam" id="redio_next_exam">Eligibility for upcoming Examinations:</label>
						<div class="custom-control custom-radio">
							<input type="radio" class="custom-control-input" name="elig_for_next_exam" id="radio-ex-yes">
							<label class="custom-control-label" for="radio-ex-yes">Yes</label>
						</div>
						<div class="custom-control custom-radio">
							<input type="radio" class="custom-control-input" name="elig_for_next_exam" id="radio-ex-no">
							<label class="custom-control-label" for="radio-ex-no">No</label>
						</div>
					</div>
					<div class="col-lg-1"></div>
				</div>
				<div class="form-group-lg">
					<label for="prev_yr_scholar_amt">Scholarship Amount Recdived Previous Year</label>
					<input type="text" name="prev_yr_scholar_amt" />
				</div>
				<div class="form-group-lg">
					<select class="custom-select cust" name="la_yr_course" id="sel_dept">
						<option disabled selected>Last Year Course</option>
						<option value="Computer Science Engineering">Computer Sciense Engineering</option>
						<option value="Civil Engineering">Civil</option>
						<option value="Mechanical Engineering">Mechanical Engineering</option>
						<option value="Polymer Technology">Polymer</option>
						<option value="Plastic Technology">Plastic</option>
						<option value="Electrical and Electronics Engineering">Electrical And Electronical Engineering</option>
					</select>
				</div>
				<div class="form-group-lg">
					<select class="custom-select cust" name="cu_yr_course" id="sel_dept">
						<option disabled selected>Current Year Course</option>
						<option value="Computer Science Engineering">Computer Sciense Engineering</option>
						<option value="Civil Engineering">Civil</option>
						<option value="Mechanical Engineering">Mechanical Engineering</option>
						<option value="Polymer Technology">Polymer</option>
						<option value="Plastic Technology">Plastic</option>
						<option value="Electrical and Electronics Engineering">Electrical And Electronical Engineering</option>
					</select>
				</div>
				<div class="p-2 m-2 text-secondary">
					Hostel Details
				</div>
				<div class="row">
					<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
						<div class="form-group">
							<div class="inputWithIcon">
								<input type="text" id="date_chk_in_la_yr" onclick="(this.type='date')" onblur="(this.type='text')" class="form-control form-control-sub text-date" name="hostel_chk_in_la_yr" required>
								<label for="date_chk_in_la_yr" class="form-control-sub-placeholder">Checkin Last Year</label>
								<i class="fa fa-calendar"></i>
								<span class="highlight"></span>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
						<div class="form-group">
							<div class="inputWithIcon">
								<input type="text" id="date_chk_out_la_yr" onclick="(this.type='date')" onblur="(this.type='text')" class="form-control form-control-sub text-date" name="hostel_chk_out_la_yr" required>
								<label for="date_chk_out_la_yr" class="form-control-sub-placeholder">Checkout Last Year</label>
								<i class="fa fa-calendar-o"></i>
								<span class="highlight"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
						<div class="form-group">
							<div class="inputWithIcon">
								<input type="text" id="date_chk_in_cu_yr" onclick="(this.type='date')" onblur="(this.type='text')" class="form-control form-control-sub text-date" name="hostel_chk_in_cu_yr" required>
								<label for="date_chk_in_cu_yr" class="form-control-sub-placeholder">Checkin Current Year</label>
								<i class="fa fa-calendar-plus-o"></i>
								<span class="highlight"></span>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
						<div class="form-group">
							<div class="inputWithIcon inputWithIcon-date">
								<input type="text" id="date_chk_out_cu_yr" class="form-control form-control-sub text-date " onclick="(this.type='date')" onblur="(this.type='text')" name="hostel_chk_out_cu_yr" required>
								<label for="date_chk_out_cu_yr" class="form-control-sub-placeholder">Checkout Current Year (Approx.)</label>
								<i class="fa fa-calendar-times-o"></i>
								<span class="highlight"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group-lg">
					<input type="hidden" name="date" value="<?= date('d-m-Y') ?>">
				</div>
				<div class="form-group-lg text-center">
					<button type="submit" class="btn btn-lg btn-primary">Submit Form</button>
				</div>
			</form>
		</div>
	</body>
</html>