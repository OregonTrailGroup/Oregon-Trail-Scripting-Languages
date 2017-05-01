<?php
	function startHTML($title) {
?>
		<html>

			<head>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
				<script type="text/javascript" src="proj2.js"></script>
				<link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
				<link href="proj2.css" rel="stylesheet" type="text/css"/>
				<title><?php echo $title; ?></title>
			</head>
			<body>
				Welcome to our page. This will serve as the hosting site for our Oregon Trail project for CMSC 433.<br>
				<a href="https://archive.org/details/msdos_Oregon_Trail_The_1990">Click here to play from an external site</a>
				<br>
				<br>
				<div id="div_wrapper">
					<div id="div_game">
<?php
	}
?>

<?php
	function endHTML() {
?>
					</div>
				</div>
			</body>

		</html>
<?php
	}
?>