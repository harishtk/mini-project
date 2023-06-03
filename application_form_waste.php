<?php
	include('session.php');
?>
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
		<!--
		naveen
		-->
		<script type="text/javascript">
		
		$(document).ready(function(){
			$('.prev-slide').click(function(){
				$('#carouselExampleControls').carousel('prev');
				progress.attr("value","50");
				progressMessage.text("the form it wants you");
		});
		$('.next-sliide').click(function(){
		$('#carouselExampleControls').carousel('next');
		});
		var d = new Date();
		document.getElementById("demo").innerHTML = d.toUTCString();
		$('#student-details-form').submit(function (evt) {
			evt.preventDefault();
			var req = $.ajax({
				url: 'application_submitter.php',
				type: 'POST',
				data:
			});
		});
		
		
		});
		//$('#btn-nxt').click(function(){
		//$('#carouselExampleControls').carousel('carousel-control-next');
		//});
		
		</script>
		<title>Welcome</title>
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
		<div class="">
			<h1 class="text-center">Welcome!</h1>
			<h3 class="text-center">Application Form comes here :)</h3>
			
			<div id="carouselExampleControls" class="carousel slide" data-interval="false" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
				</ol>
				
				<div class="carousel-inner">
					<div class="carousel-item active ">
						<div class="container">
							<div class=" form-container">
								<br><br>
								<form method="POST" id="student-details-form" action="application_submitter.php">
									<div class="row">
										<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
											<div class="form-group">
												<div class="inputWithIcon">
													<input type="text" name="stud_name" id="text_stud_name" class="form-control form-control-sub" required>
													<label for="text_stud_name" class="form-control-sub-placeholder">Student Name</label>
													<i class="fa fa-graduation-cap"></i>
													<span class="highlight"></span>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
											<div class="form-group">
												<div class="inputWithIcon">
													<input type="text" name="father_name" id="text_father_name" class="form-control form-control-sub" required>
													<label for="text_father_name" class="form-control-sub-placeholder">Father's Name</label>
													<i class="glyphicon glyphicon-user"></i>
													<span class="highlight"></span>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
											<div class="form-group">
												<div class="inputWithIcon">
													<input type="text" name="caste" id="text_caste" class="form-control form-control-sub" required>
													<label for="text_caste" class="form-control-sub-placeholder">Caste</label>
													<i class="fa fa-file-text-o"></i>
													<span class="highlight"></span>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
											<div class="form-group">
												<div class="inputWithIcon-select">
													<select class="custom-select cust" name="class" id="sel_class">
														<option disabled selected>Choose Class..</option>
														<option value="BC">BC</option>
														<option value="MBC">MBC</option>
														<option value="AC">AC</option>
														<option value="DC/BC">DC/BC</option>
													</select>
													<i class="fa fa-group"></i>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-12 col-sm-12 col-md-12 col-lg-12">
											<div class="form-group">
												<div class="inputWithIcon-text">
													<textarea class="form-control form-control-sub text-icon" name="clg_address" rows="5" id="texta_clg_address" type="text" required></textarea>
													<label for="texta_clg_address" class="form-control-sub-placeholder">College Address</label>
													<i class="fa fa-pencil-square-o"></i>
													<span class="highlight"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
											<div class="form-group">
												<div class="inputWithIcon-select">
													<select class="custom-select cust" name="dept" id="sel_dept">
														<option disabled selected>LastYearCourse</option>
														<option value="Computer Science Engineering">Computer Sciense Engineering</option>
														<option value="Civil Engineering">Civil</option>
														<option value="Mechanical Engineering">Mechanical Engineering</option>
														<option value="Polymer Technology">Polymer</option>
														<option value="Plastic Technology">Plastic</option>
														<option value="Electrical and Electronics Engineering">Electrical And Electronical Engineering</option>
													</select>
													<i class="fa fa-building"></i>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
											<div class="form-group">
												<div class="inputWithIcon-select">
													<select class="custom-select cust" name="dept" id="sel_dept">
														<option disabled selected>Current Year Course</option>
														<option value="Computer Science Engineering">Computer Sciense Engineering</option>
														<option value="Civil Engineering">Civil</option>
														<option value="Mechanical Engineering">Mechanical Engineering</option>
														<option value="Polymer Technology">Polymer</option>
														<option value="Plastic Technology">Plastic</option>
														<option value="Electrical and Electronics Engineering">Electrical And Electronical Engineering</option>
													</select>
													<i class="fa fa-building-o"></i>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group">
											<div class="inputWithIcon-select">
												<select class="custom-select cust" name="dept" id="sel_dept">
													<option disabled selected>Choose Dept</option>
													<option value="Computer Science Engineering">Computer Sciense Engineering</option>
													<option value="Civil Engineering">Civil</option>
													<option value="Mechanical Engineering">Mechanical Engineering</option>
													<option value="Polymer Technology">Polymer</option>
													<option value="Plastic Technology">Plastic</option>
													<option value="Electrical and Electronics Engineering">Electrical And Electronical Engineering</option>
												</select>
												<i class="fa fa-institution"></i>
											</div>
										</div>
									</div>
									<!--<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group">
											<div class="inputWithIcon">
												<input type="text" name="reg_no" id="text_reg_no" class="form-control form-control-sub" required>
												<label for="text_reg_no" class="form-control-sub-placeholder">Regno</label>
												<i class="fa fa-graduation-cap"></i>
												<span class="highlight"></span>
											</div>
										</div>
									</div>-->
									<!--<div class="row">
											<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
													<div class="form-group">
															<div class="inputWithIcon">
																	<input type="text" name="no_of_arrear" id="text_no_of_arrear" class="form-control form-control-sub" required>
																	<label for="text_no_of_arrear" class="form-control-sub-placeholder">No Of Arrear</label>
																	<i class="fa fa-folder-open"></i>
																	<span class="highlight"></span>
															</div>
													</div>
											</div>
									</div>-->
									<div class="form-group">
										<button type="button" name="" class=" btn-lg btn-submit water-drop next-slide carousel-control-next" data-toggle="tooltip" data-placement="top" title="Proceed to Next!" data-slide="next"><i class="fa fa-arrow-right"></i>Next</button>
									</div>
									
								</div>
							</div>
							<br><br>
						</div>
						<div class="carousel-item">
							<div class="container" >
								<div class="form-container">
									<br><br>
									
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
									<!--<div class="row">
											
											<div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
													<div class="form-group">
															<div class="inputWithIcon">
																	<input type="text" name="cand_prev_yr_atted" id="text_prev_yr_atted" class="form-control form-control-sub" required>
																	<label for="text_prev_yr_atted" class="form-control-sub-placeholder">PreYear Atted</label>
																	<i class="fa fa-bar-chart"></i>
																	<span class="highlight"></span>
															</div>
													</div>
											</div>
									</div>-->
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
									<div class="row">
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<div class="form-group">
												<div class="inputWithIcon">
													<input type="text" name="prev_yr_scholar_amt" class="form-control form-control-sub" id="text_prev_yr_amt" required>
													<label for="text_prev_yr_amt" class="form-control-sub-placeholder">Previous Year Amount Received</label>
													<i class="fa fa-dollar"></i>
													<span class="highlight"></span>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-1"></div>
										<div class="col-lg-10">
											<label name="elig_for_scholar" id="redio_eligi_schl">Eligibility For Scholarship:</label>
											<div class="custom-control custom-radio">
												<input type="radio" name="radios_eligi_schl" class="custom-control-input" id="radio-eligi-yes">
												<label class="custom-control-label" for="radio-eligi-yes">Yes</label>
											</div>
											<div class="custom-control custom-radio">
												<input type="radio" class="custom-control-input" name="radios_eligi_schl" id="radio-eligi-no">
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
												<input type="radio" class="custom-control-input" name="radios_next_ex" id="radio-ex-yes">
												<label class="custom-control-label" for="radio-ex-yes">Yes</label>
											</div>
											<div class="custom-control custom-radio">
												<input type="radio" class="custom-control-input" name="radios_next_ex" id="radio-ex-no">
												<label class="custom-control-label" for="radio-ex-no">No</label>
											</div>
										</div>
										<div class="col-lg-1"></div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<button type="button" name="" class=" btn-norm water-drop prev-slide" data-toggle="tooltip" data-placement="top" title="Go Back!"><i class="fa fa-mail-reply-all">Back</i></button>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<button type="button" name="" class=" btn-lg btn-norm water-drop next-sliide" data-toggle="tooltip" data-placement="top" title="Scholarship Form Apply!"><i class="fa fa-arrow-right"></i>Next</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br><br>
						</div>
						<div class="carousel-item">
							<div class="container">
								<div class="form-container">
									<br>
									
									<div class="row">
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<div class="form-group">
												<div class="inputWithIcon-text">
													<textarea type="text" name="perm_address" id="texta_perm_address" rows="5" class="form-control form-control-sub text-icon"required></textarea>
													<label for="texta_perm_address" class="form-control-sub-placeholder">Permanent Address</label>
													<i class="fa fa-envelope"></i>
													<span class="highlight"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<div class="form-group">
												<div class="inputWithIcon-text">
													<textarea type="text" id="texta_cu_address" class="form-control form-control-sub text-icon" rows="5" name="temp_address" required></textarea>
													<label for="texta_cu_address" class="form-control-sub-placeholder">Current Address</label>
													<i class="fa fa-envelope-o"></i>
													<span class="highlight"></span>
												</div>
											</div>
										</div>
									</div>
									<!-- <div class="row">
											<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
													<div class="form-group">
															<div class="inputWithIcon">
																	<input type="text" name="cand_behav_impr" id="text_prev_yr_impr" class="form-control form-control-sub" required>
																	<label for="text_prev_yr_impr" class="form-control-sub-placeholder">PrevYearImprovment</label>
																	<i class=" fa fa-send-o"></i>
																	<span class="highlight"></span>
															</div>
													</div>
											</div>
									</div> -->
									<div class="row">
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<div class="form-group">
												<div class="inputWithIcon">
													<input type="text" name="email" id="text_email" class="form-control form-control-sub" required>
													<label for="email" class="form-control-sub-placeholder">Email</label>
													<i class="glyphicon glyphicon-envelope"></i>
													<span class="highlight"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<button type="button" name="" class="btn-submit water-drop prev-slide" data-toggle="tooltip" data-placement="top" title="Go Back!"><i class="fa fa-mail-reply-all"></i>Back</button>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<button type="submit" name="" class="btn-submit water-drop next-sliide" data-toggle="tooltip"data-placement="top" title="Apply Scholarship Form!"><i class="fa fa-rocket">Submit</i></button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<br>
					</div>
					<!-- Avinash-->
					<div class="carousel-item">
						<div class="container">
							<div class="form-container">
								<form>
									
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">1st year</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">2nd year</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">3rd year</a>
										</li>
									</ul>
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
											<div class="row">
												<div class="col-lg-1"></div>
												<div class="col-lg-10 col-sm-12 col-md-12 col-xs-12">
													<div class="table-responsive">
														<table class="table">
															<thead>
																<tr>
																	<th>needed</th>
																	<th>file upload</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Aadhar card:</td>
																	<td> <input type="file" name=""></td>
																</tr>
																<tr>
																	<td>Contact Certificate:</td>
																	<td> <input type="file" name=""></td>
																</tr>
																<tr>
																	<td>10 Marksheet:</td>
																	<td> <input type="file" name=""></td>
																</tr>
																<tr>
																	<td>Income certificate:</td>
																	<td> <input type="file" name=""></td>
																</tr>
																<tr>
																	<td>Bankpass book:</td>
																	<td> <input type="file" name=""></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="col-lg-1 col-md-1"></div>
											</div>
										</div>
										<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
											<div class="row">
												<div class="col-lg-1"></div>
												<div class="col-lg-10 col-sm-12 col-md-12 col-xs-12">
													<div class="table-responsive">
														<table class="table">
															<thead>
																<tr>
																	<th>needed</th>
																	<th>file upload</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Aadhar card:</td>
																	<td> <input type="file" name=""></td>
																</tr>
																<tr>
																	<td>Income certificate:</td>
																	<td> <input type="file" name=""></td>
																</tr>
																<tr>
																	<td>Bankpass book:</td>
																	<td><input type="file" name=""></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="col-lg-1 col-md-1"></div>
											</div>
										</div>
										<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
											<div class="row">
												<div class="col-lg-1"></div>
												<div class="col-lg-10 col-sm-12 col-md-12 col-xs-12">
													<div class="table-responsive">
														<table class="table">
															<thead>
																<tr>
																	<th>needed</th>
																	<th>file upload</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Aadhar card:</td>
																	<td> <input type="file" name=""></td>
																</tr>
																<tr>
																	<td> Bankpass book:</td>
																	<td><input type="file" name=""></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="col-lg-1 col-md-1"></div>
											</div>
										</div>
									</div>
									
								</form>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<button type="submit" name="" class="btn-submit water-drop prev-slide" data-toggle="tooltip" data-placement="top" title="Any Changes To Click Back!"><i class="fa fa-mail-reply-all">Back</i></button>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<button type="submit" name="" class="btn-submit water-drop next-sliide" data-toggle="tooltip"data-placement="top" title="Scholarship Form Apply!"><i class="glyphicon glyphicon-log-in">Submit</i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br><br>
					</div>
					<!-- Bala Ashok-->
					<div class="carousel-item">
						<div class="container">
							<div class="form-container">
								<img src="nk.jpg" class="rounded mx-auto d-block" alt="...">
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-8">
										<p>welcome to team bhaann:)</p>
									</div>
									<div class="col-lg-2"></div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<p id="demo"></p>
									</div>
									<div class="col-lg-6">
										<h6>TamilNaduPolyTechnic College</h6><br>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-8"></div>
									<div class="col-lg-4"> <h6>Madurai</h6></div>
								</div>
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-6">
										<div class="form-group">
											<button type="submit" name="" class="btn-submit water-drop" data-toggle="tooltip"data-placement="top" title="Scholarship Form Apply!"><i class="fa fa-rocket">Submit</i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br> <br>
					</div>
					
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" hidden="hidden" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				
				<a class="carousel-control-next" hidden="hidden" href="#carouselExampleControls" id="next" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				<!-- End of form style Naveen  -->
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
			
		</div>
	</body>
</html>