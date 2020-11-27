<a>masuk</a><?php

	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$provinsiID = $_GET["hapus"];
		mysqli_query($connection, "Delete from provinsi where provinsiID = '$provinsiID'");
		echo"<script>alert('DATA BERHASIL DIHAPUS');
		document.location='InputOutputProvinsi.php' </script>";
	}
?>