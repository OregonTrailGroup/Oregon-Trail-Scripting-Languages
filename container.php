<?php

	function container_begin($title = "My page")
	{
?>
<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>

	<body>
<?php 
	}
?>


<?php
	function container_end()
	{ 
?>

		<h1>This should occur after all the other text content</h1>
	</body>
</html>
<?php
	}
?>

