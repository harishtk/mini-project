<?php 

	include('session.php');

	if ( isset($_POST['msg']) ) {
		foreach ($_POST as $key => $value) {
			?>
			<script type="text/javascript">
				alert(<?= $key ?> + " : " + <?= $value ?>);
			</script>
			<?php
		}
	}

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
	<title>Upload Documents</title>
	<script type="text/javascript">
		$(document).ready(function () {
			
		});
	</script>
</head>
<body class="parallax">
	<div class="container-custom mx-auto w-50 bg-light mt-5 rounded border border-info">
		<div class="display-4 text-center text-secondary p-2 m-2">
			Upload Documents
		</div> 
		<form method="post" action="upload_docs_handler.php" enctype="multipart/form-data">
			<div class="form-group-lg p-2 m-3">
				<input type="file" name="prof_img" id="prof-img" class="form-control-file" value="" required>
			</div>
			<div class="form-group-lg p-2 m-3">
				<input type="file" name="address_proof" class="form-control-file" required>
			</div>
			<div class="form-group-lg p-2 m-3">
				<input type="file" name="bank_passbook" class="form-control-file" required>
			</div>
			<div class="form-group-lg p-2 m-3">
				<input type="file" name="community_certificate" class="form-control-file" required>
			</div>
			<div class="form-group-lg p-2 m-3">
				<input type="file" name="marksheet" class="form-control-file" required>
			</div>
			<div class="form-group-lg p-2 m-3 text-center">
				<button type="submit" class="btn btn-primary btn-lg">Upload Documents</button>
			</div>
		</form>
		<div class="display-4" id="err">
			
		</div>
	</div>
</body>
</html>