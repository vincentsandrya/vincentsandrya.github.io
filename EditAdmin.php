
<!DOCTYPE html>
<html lange="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Wisata</title>
</head>
	<?php 
	ob_start();
	session_start();
	if(!isset($_SESSION['emailuser']))
		header("location:login.php");
	include "header.php";
	?>
	<div class="container-fluid">
	<div class="card shadow mb-4">


<?php
	include "include/config.php";

	if(isset($_POST['Batal']))
	{
		header("location:index.php");
	}

	if(isset($_POST['Ubah']))
	{
		$adminNama = $_POST['adminNama'];
		$adminEmail = $_POST['adminEmail'];
		$adminPassword = MD5($_POST['adminPassword']); 

		$nama = $_FILES['file']['name'];
		$file_tmp  =$_FILES["file"]["tmp_name"];

		if(empty($nama))
		{
			mysqli_query($connection, "UPDATE Admin SET adminNama = '$adminNama' ,adminEmail = '$adminEmail' ,adminPassword = '$adminPassword' where adminID = '$adminID' ");
			header("location:EditAdmin.php");
		}
		else
		{
			$ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);
		}

		//periksa ekstensi file haru jpg / JPG
		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG"))
		{
			move_uploaded_file($file_tmp , 'images/'.$nama); //unggah file ke folder images
			mysqli_query($connection, "UPDATE Admin SET adminNama = '$adminNama' ,adminEmail = '$adminEmail' ,adminPassword = '$adminPassword', adminFoto = '$nama' where adminID = '$adminID' ");
			header("location:index.php");
		}
	}

	  // u/ menampilkan data pada form edit
	  $editAdmin = mysqli_query($connection, "SELECT * FROM Admin WHERE AdminID = '$adminID'");
	  $rowEdit = mysqli_fetch_array($editAdmin);
?>

	<div class="row"> <!--memberi jarak-->
		<div class="col-sm-1"></div>
		    <div class="col-sm-10">
			    <div class="jumbotron jumbotron-fluid">
					<div class="container">
						<h1 class="display-4"> Edit Profile</h1>
					</div>
				</div>
		      <form method="POST" enctype="multipart/form-data">
		        

		        <div class="form-group row">
				 <label for="file" class="col-sm-2 col-form-label">Foto Profil</label>
				 <div class="col-sm-10">
				 	<img src="images/<?php echo $rowEdit['adminFoto']?>" style = "width:auto; height:100px;">
				  <input type="file" id="file" name="file" >
				  
				  <p class="help-block">Field ini digunakan untuk unggah file</p>
				 </div>
				</div>

		        <div class="form-group row">
		          <label for="adminID" class="col-sm-2 col-form-label">Kode</label>
		          <div class="col-sm-10">
		            <input type="text" class="form-control" id="adminID" name="adminID" value="<?php echo $rowEdit["adminID"]?>" readonly>
		          </div>
		        </div>

		        <div class="form-group row">
		          <label for="adminNama" class="col-sm-2 col-form-label">Nama</label>
		          <div class="col-sm-10">
		            <input type="text" class="form-control" id="adminNama" name="adminNama" value="<?php echo $rowEdit["adminNama"]?>">
		          </div>
		        </div>

		        <div class="form-group row">
		          <label for="adminEmail" class="col-sm-2 col-form-label">Email</label>
		          <div class="col-sm-10">
		            <input type="text" class="form-control" id="adminEmail" name="adminEmail" value="<?php echo $rowEdit["adminEmail"]?>">
		          </div>
		        </div>

		        <div class="form-group row">
		          <label for="adminPassword" class="col-sm-2 col-form-label">Password</label>
		          <div class="col-sm-10">
		            <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="Masukkan password baru">
		          </div>
		        </div>

		        <div class="form-group row"> 
		          <div class="col-sm-2"></div>
		          <div class="col-sm-10">
		            <input type="submit" class="btn btn-primary" value="Ubah" name="Ubah"></button>
		            <input type="reset" class="btn btn-secondary" value="batal" name="Batal"></button>
		          </div>
		        </div>

		      </form>
		    </div>

		<div class = "col-sm-1"></div>
	</div>





	</div>
	</div> <!-- penutup container fluid-->
	<?php include "footer.php";?>
	<?php
mysqli_close($connection);
ob_end_flush();

?>
</html>