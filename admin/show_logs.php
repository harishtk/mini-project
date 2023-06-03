<?php

	$filepath = "../log-dump/logs.csv";
	
	$file = fopen($filepath, "r");
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logs</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../js/jquery.min.js"></script>
	<script src="../DT.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
	<table border="2" cellpadding="10">
		<tr>
			<th>Time</th>
			<th>Username</th>
			<th>Detail</th>
		</tr>

		<?php
			while ( $line = fread($file, filesize($filepath)) ) {
				$tr = "<tr>";
				$tr .= '<td colspan="3">'.$line;
				$tr .= "</tr>";
				echo $tr;
			}
		?>
	</table>
</body>
</html>