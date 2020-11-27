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

  if(isset($_POST['Simpan']))
  {
    if(isset($_REQUEST['provinsiID']))
    {
      $provinsiID=$_REQUEST['provinsiID'];
    }

    if(!empty($provinsiID))
    {
      $provinsiID=$_REQUEST['provinsiID'];
    }
    else
    {
      ?> <h1>Anda harus mengisi data</h1> <?php
      die("anda harus memasukkan datanya");
    }

    $provinsiNama = $_POST['provinsiNama'];
    $provinsiTglBerdiri = $_POST['provinsiTglBerdiri'];

    mysqli_query($connection, "insert into provinsi values ('$provinsiID','$provinsiNama','$provinsiTglBerdiri')");
    header("location:InputOutputProvinsi.php");
  }
?>
<html lange="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Output Provinsi Wisata</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
	<div class="row"> <!--memberi jarak-->
		<div class="col-sm-1"></div>
		    <div class="col-sm-10">
			    <div class="jumbotron jumbotron-fluid">
					<div class="container">
						<h1 class="display-4"> Input Provinsi Wisata</h1>
					</div>
				</div>
		      <form method="POST">
		        
		        <div class="form-group row">
		          <label for="provinsiID" class="col-sm-2 col-form-label">Kode</label>
		          <div class="col-sm-10">
		            <input type="text" class="form-control" id="provinsiID" name="provinsiID" placeholder="provinsiID" maxlength="4">
		          </div>
		        </div>

		        <div class="form-group row">
		          <label for="provinsiNama" class="col-sm-2 col-form-label">Nama</label>
		          <div class="col-sm-10">
		            <input type="text" class="form-control" id="provinsiNama" name="provinsiNama" placeholder="Nama Provinsi">
		          </div>
		        </div>

		        <div class="form-group row">
		          <label for="provinsiTglBerdiri" class="col-sm-2 col-form-label">Tanggal Berdiri</label>
		          <div class="col-sm-10">
		            <input type="date" class="form-control" id="datepicker" name="provinsiTglBerdiri" placeholder="provinsiTglBerdiri">
		          </div>
		        </div>

		        <div class="form-group row"> 
		          <div class="col-sm-2"></div>
		          <div class="col-sm-10">
		            <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan"></button>
		            <input type="reset" class="btn btn-secondary" value="batal" name="Batal"></button>
		          </div>
		        </div>


		      </form>
		    </div>

		<div class = "col-sm-1"></div>
	</div>
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4"> Daftar Provinsi Wisata</h1>
					<h2>Hasil entri data pada tabel Provinsi</h2>
				</div>
			</div>

			<form method="POST">
				<div class="form-group row mb-2">
					<label for="search" class="col-sm-3">Nama Provinsi</label>
					<div class="col-sm-6">
						<input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Nama Provinsi">
					</div>
					<input type="submit" name="Kirim" class="col-sm-1 btn btn-primary" value="Search">
				</div>

			</form>

			<table class="table table-hover table-danger">
				<thead class="thead-dark">
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama Provinsi</th>
						<th>Tanggal Berdiri</th>
						<th colspan="2" style="text-align: center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php

					if(isset($_POST["Kirim"]))
					{
						$search = $_POST['search'];
						$query = mysqli_query($connection, "select * from Provinsi where provinsiNama like '%".$search."%'
							or provinsiTglBerdiri like '%".$search."%' 
							");
					}
					else
					{
						$query = mysqli_query($connection, "select * from Provinsi");
					}

						
						$nomor=1;

						while($row = mysqli_fetch_array($query))
						{
							?>
							<tr>
								<td><?php echo $nomor;?></td>
								<td><?php echo $row['provinsiID'];?></td>
								<td><?php echo $row['provinsiNama'];?></td>
								<td><?php echo $row['provinsiTglBerdiri'];?></td>
								<td>
								  <a href="EditProvinsi.php?ubah=<?php echo $row[
								  "provinsiID"]?>" class="btn btn-success btn-sm" title="EDIT">

								  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
								  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
								  </svg>
								  </a>
								</td>

								<td>
								  <a href="HapusProvinsi.php?hapus=<?php echo $row["provinsiID"]?>" class="btn btn-danger btn-sm" title="DELETE"> 

								  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
								  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
								  </svg>
								  </a>
								</td>
							</tr>

							<?php
							$nomor++;
						}
					?>
				</tbody>
				
				
			</table>
			
		</div>
		<div class="col-sm-1"></div>
	</div>
	<script type="text/javascript" src="js/bootstrap.min.js">
	</script>

	    <script src="js/date.js"></script>
	</div>
	</div> <!-- penutup container fluid-->
	<?php include "footer.php";?>
	<?php
mysqli_close($connection);
ob_end_flush();

?>
</html>

	