<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$id_biaya = $_REQUEST['id_biaya'];
		$jenis = $_REQUEST['jenis'];
		$paket = $_REQUEST['paket'];
		$biaya = $_REQUEST['biaya'];

		$sql = mysqli_query($koneksi, "UPDATE biaya SET jenis='$jenis', paket='$paket', biaya='$biaya' WHERE id_biaya='$id_biaya'");

		if($sql == true){
			header('Location: ./admin.php?hlm=biaya');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_biaya = $_REQUEST['id_biaya'];

		$sql = mysqli_query($koneksi, "SELECT * FROM biaya WHERE id_biaya='$id_biaya'");
		while($row = mysqli_fetch_array($sql)){

?>
<h2>Edit Data Master total Harga</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Jenis Restoran</label>
		<div class="col-sm-4">
			<input type="hidden" name="id_total" value="<?php echo $row['id_total']; ?>">
			<input type="text" class="form-control" id="jenis" value="<?php echo $row['jenis']; ?>" name="jenis" placeholder="Jenis Restoran" required>
		</div>
	</div>
	<div class="form-group">
		<label for="paket" class="col-sm-2 control-label">Paket</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="paket" value="<?php echo $row['paket']; ?>" name="paket" placeholder="Paket" required>
		</div>
	</div>
	<div class="form-group">
		<label for="biaya" class="col-sm-2 control-label">Harga</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="biaya" value="<?php echo $row['biaya']; ?>" name="biaya" placeholder="Harga" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=biaya" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php

	}
	}
}
?>
