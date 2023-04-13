<?php
include('../../config/koneksi.php');
include('../part/header.php');

$nik = $_POST['fnik'];

$qCekNik = mysqli_query($connect, "SELECT * FROM penduduk WHERE nik = '$nik'");
$row = mysqli_num_rows($qCekNik);

if ($row > 0) {
	$data = mysqli_fetch_assoc($qCekNik);
	if ($data['nik'] == $nik) {
		$_SESSION['nik'] = $nik;
?>

		<body class="bg-light">
			<div class="container" style="max-height:cover; padding-top:30px;  padding-bottom:60px; position:relative; min-height: 100%;">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<h5 class="card-header"><i class="fas fa-envelope"></i> INFORMASI SURAT</h5>
							<br>
							<div class="container-fluid">
								<div class="row">
									<a class="col-sm-6">
										<h5><b>SURAT REKOMENDASI</b></h5>
									</a>
								</div>
							</div>
							<hr>
							<form method="post" action="simpan-surat.php">
								<h6 class="container-fluid" align="right"><i class="fas fa-user"></i> Informasi Calon Laki Laki</h6>
								<hr width="97%">
								<div class="row">
                                    <div class="col-sm-6">
									    <div class="form-group">
										    <label class="col-sm-12" style="font-weight: 500;">NIK</label>
											<div class="col-sm-12">
												<input type="text" name="fnik" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['nik']; ?>" readonly>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap</label>
											<div class="col-sm-12">
												<input type="text" name="fnama" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['nama']; ?>" readonly>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Bin / Binti</label>
											<div class="col-sm-12">
												<input type="text" name="fbin" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['nama_ayah']; ?>" readonly>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Tempat Lahir</label>
											<div class="col-sm-12">
												<input type="text" name="ftempat_lahir" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['tempat_lahir']; ?>" readonly>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Tanggal Lahir</label>
											<div class="col-sm-12">
												<?php
												$tgl_lhr = date($data['tgl_lahir']);
												$tgl = date('d ', strtotime($tgl_lhr));
												$bln = date('F', strtotime($tgl_lhr));
												$thn = date(' Y', strtotime($tgl_lhr));
												$blnIndo = array(
													'January' => 'Januari',
													'February' => 'Februari',
													'March' => 'Maret',
													'April' => 'April',
													'May' => 'Mei',
													'June' => 'Juni',
													'July' => 'Juli',
													'August' => 'Agustus',
													'September' => 'September',
													'October' => 'Oktober',
													'November' => 'November',
													'December' => 'Desember'
												);
												?>
												<input type="text" name="ftanggal_lahir" class="form-control" style="text-transform: capitalize;" value="<?php echo "", $tgl . $blnIndo[$bln] . $thn; ?>" readonly>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
											<div class="col-sm-12">
												<input type="text" name="fjenis_kelamin" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['jenis_kelamin']; ?>" readonly>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Kewarganegaraan</label>
											<div class="col-sm-12">
												<input type="text" name="fkewarganegaraan" class="form-control" style="text-transform: uppercase;" value="<?php echo $data['kewarganegaraan']; ?>" readonly>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Agama</label>
											<div class="col-sm-12">
												<input type="text" name="fagama" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['agama']; ?>" readonly>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Pekerjaan</label>
											<div class="col-sm-12">
												<input type="text" name="fpekerjaan" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['pekerjaan']; ?>" readonly>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Alamat</label>
											<div class="col-sm-12">
												<textarea type="text" name="falamat" class="form-control" style="text-transform: capitalize;" readonly><?php echo $data['jalan'] . ", RT" . $data['rt'] . "/RW" . $data['rw'] . ",\nDesa " . $data['desa'] . ", Kecamatan " . $data['kecamatan'] . ", " . $data['kabupaten']; ?></textarea>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Status Perkawinan</label>
											<div class="col-sm-12">
												<input type="text" name="fstatus" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['status_perkawinan']; ?>" readonly>
											</div>
										</div>
									</div>
								</div>
								<br>
								<h6 class="container-fluid" align="right"><i class="fas fa-user"></i> Informasi Calon Perempuan</h6>
								<hr width="97%">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">NIK</label>
											<div class="col-sm-12">
												<input type="text" name="nik_per" class="form-control" style="text-transform: capitalize;" placeholder="NIK" required>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap</label>
											<div class="col-sm-12">
												<input type="text" name="nama_per" class="form-control" style="text-transform: capitalize;" placeholder="Nama Lengkap" required>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Bin / Binti</label>
											<div class="col-sm-12">
												<input type="text" name="binti_per" class="form-control" style="text-transform: capitalize;" placeholder="Binti" required>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Tempat Lahir</label>
											<div class="col-sm-12">
												<input type="text" name="tempat_per" class="form-control" style="text-transform: capitalize;" placeholder="Tempat Lahir" required>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Tanggal Lahir</label>
											<div class="col-sm-12">
												<input type="text" name="tanggal_per" class="form-control" style="text-transform: capitalize;" placeholder="Tanggal Lahir" required>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
											<div class="col-sm-12">
												<input type="text" name="jk_per" class="form-control" style="text-transform: capitalize;" placeholder="Jenis Kelamin" required>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Kewarganegaraan</label>
											<div class="col-sm-12">
												<input type="text" name="kewarganegaraan_per" class="form-control" style="text-transform: capitalize;" placeholder="Kewarganegaraan" required>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Agama</label>
											<div class="col-sm-12">
												<input type="text" name="agama_per" class="form-control" style="text-transform: capitalize;" placeholder="Agama" required>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Pekerjaan</label>
											<div class="col-sm-12">
												<input type="text" name="pekerjaan_per" class="form-control" style="text-transform: capitalize;" placeholder="Pekerjaan" required>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Alamat</label>
											<div class="col-sm-12">
												<input type="text" name="alamat_per" class="form-control" style="text-transform: capitalize;" placeholder="Alamat Lengkap" required>
											</div>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-12" style="font-weight: 500;">Status Perkawinan</label>
											<div class="col-sm-12">
												<input type="text" name="status_per" class="form-control" style="text-transform: capitalize;" placeholder="Status Perkawinan" required>
											</div>
										</div>
									</div>
								</div>
								<hr width="97%">
								<div class="container-fluid">
									<input type="reset" class="btn btn-warning" value="Batal">
									<input type="submit" name="submit" class="btn btn-info" value="Submit">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</body>

<?php
	}
} else {
	header("location:index.php?pesan=gagal");
}

include('../part/footer.php');
?>