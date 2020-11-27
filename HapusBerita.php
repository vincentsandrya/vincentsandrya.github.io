<a>masuk</a><?php

	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$beritaID = $_GET["hapus"];
		mysqli_query($connection, "Delete from berita where beritaID = '$beritaID'");
		echo"<script>alert('DATA BERHASIL DIHAPUS');
		document.location='InputOutputBerita.php' </script>";
	}
?>