<a>masuk</a><?php

	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$destinasiID = $_GET["hapus"];
		mysqli_query($connection, "Delete from destinasi where destinasiID = '$destinasiID'");
		echo"<script>alert('DATA BERHASIL DIHAPUS');
		document.location='InputOutputDestinasi.php' </script>";
	}
?>