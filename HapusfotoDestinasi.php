<a>masuk</a><?php

	include "include/config.php";
	if(isset($_GET['hapus']))
	{
		$fotoID = $_GET["hapus"];
		$hapusfoto = mysqli_query($connection, "select * from fotodestinasi where fotoID = '$fotoID'");
		$hapus = mysqli_fetch_array($hapusfoto);
		$namafile = $hapus['fotofile'];
		mysqli_query($connection, "Delete from fotodestinasi where fotoID = '$fotoID'");

		unlink('images/'.$namafile);

		echo"<script>alert('DATA BERHASIL DIHAPUS');
		document.location='InputOutputFoto.php' </script>";
	}
?>