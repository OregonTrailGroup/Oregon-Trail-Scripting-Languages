<?php

	function container($content, $title = "My page")
	{
?>
<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>

	<body>
		<?php echo $content; ?>
	</body>
</html>
<?php
	}
?>

