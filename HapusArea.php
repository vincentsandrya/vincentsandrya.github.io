<a>masuk</a><?php

	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$areaID = $_GET["hapus"];
		mysqli_query($connection, "Delete from area where areaID = '$areaID'");
		echo"<script>alert('DATA BERHASIL DIHAPUS');
		document.location='InputOutputArea.php' </script>";
	}
?>