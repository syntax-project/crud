<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>BIO</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<style>
		body{
			margin: 10px auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Tabel Biodata Mahasiswa</h1>
		<?php 
			$no = 1;
			if (isset($_GET['cari'])) {
				$cari = $_GET['cari'];
				// echo "<p class='text-muted'>Hasil pencarian : <b>$cari</b></p>";
			}
		?>
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-pills card-header-pills">
					<li class="nav-item">
						<a href="index.php" class="nav-link active">Home</a>
					</li>
					<li>&nbsp;</li>
		      <li class="nav-item">
		        <a href="input.php" class="nav-link active" href="#">Input</a>
		      </li>
		      <li class="nav-item">&nbsp;</li>
		      <li class="nav-item">
						  <form class="form-inline">
						    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="cari" required="">
						    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						  </form>
		      </li>
		    </ul>	
			</div>
			<div class="card-body">
				<table class="table table-stripped">
					<thead>
						<tr>
				        <th>No</th>
				        <th>NIM</th>
				        <th>Nama</th>
				        <th>Jenis Kelamin</th>
				        <th>Program Studi</th>
				        <th>Jurusan</th>
				        <th>Alamat</th>
				        <th>Aksi</th>
				      </tr>
					</thead>
					<tbody>
						<?php 
							if(isset($_GET['cari'])){
								$query = "SELECT * FROM mahasiswa WHERE nim LIKE '%$cari%' OR nama LIKE '%$cari%'";
								$result = mysqli_query($link, $query);
								$rows = mysqli_num_rows($result);
								
								if($rows < 1){
									echo "<p class='text-muted'>Data Not Found!!</p>";
								}else{
									echo "<p class='text-muted'>Hasil pencarian : <b>$cari</b></p>";
								}
							}else{
								$query = "SELECT * FROM mahasiswa ORDER BY nim ASC";
							}

							$no = 1;
							$result = mysqli_query($link,$query);
							foreach ($result as $row) {
								echo "
								<tr>
					        <td>$no</td>
					        <td>$row[nim]</td>
					        <td>$row[nama]</td>
					        <td>$row[jenis_kelamin]</td>
					        <td>$row[program_studi]</td>
					        <td>$row[jurusan]</td>
					        <td>$row[alamat]</td>
					        <td>
										<a href='?id=$row[id]' class='btn btn-sm btn-primary'>Edit</a>
										<a href='?id=$row[id]' class='btn btn-sm btn-danger'>Hapus</a>
					        </td>
					      </tr>";
					      $no++;
							}
							
			      ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>