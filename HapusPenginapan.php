<a>masuk</a><?php

	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$penginapanID = $_GET["hapus"];
		mysqli_query($connection, "Delete from penginapan where penginapanID = '$penginapanID'");
		echo"<script>alert('DATA BERHASIL DIHAPUS');
		document.location='InputOutputPenginapan.php' </script>";
	}
?>