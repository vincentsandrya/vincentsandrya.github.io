<a>masuk</a><?php

	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$kategoriID = $_GET["hapus"];
		mysqli_query($connection, "Delete from kategori where kategoriID = '$kategoriID'");
		echo"<script>alert('DATA BERHASIL DIHAPUS');
		document.location='InputOutputKategori.php' </script>";
	}
?>