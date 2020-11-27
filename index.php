<!DOCTYPE html>

<?php

include "include/config.php";
ob_start();
session_start();
if(!isset($_SESSION['kodeuser']))
{
	header("location:login.php");
}


?>

<html lange="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Wisata</title>
</head>
<body>
	<?php include "header.php";?>
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">DASHBOARD ADMIN</h1>
		</div>
	</div>


	<?php include "footer.php";?>


</body>

<?php
include "include/config.php";

mysqli_close($connection);
ob_end_flush();

?>

</html>