<?php
include('../../permintaan_surat/konfirmasi/part/akses.php');
include('../../../../config/koneksi.php');

$id = $_GET['id'];
$qCek = mysqli_query($connect, "SELECT * FROM penduduk INNER JOIN surat_rekomendasi ON penduduk.nik = surat_rekomendasi.nik INNER JOIN calon_perempuan ON penduduk.nik = calon_perempuan.nik WHERE surat_rekomendasi.id_rekomendasi='$id'");
while ($row = mysqli_fetch_array($qCek)) {

	$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
	foreach ($qTampilDesa as $rows) {

		$id_pejabat_desa = $row['id_pejabat_desa'];
		$qCekPejabatDesa = mysqli_query($connect, "SELECT pejabat_desa.jabatan, pejabat_desa.nama_pejabat_desa FROM pejabat_desa LEFT JOIN surat_rekomendasi ON surat_rekomendasi.id_pejabat_desa = pejabat_desa.id_pejabat_desa WHERE surat_rekomendasi.id_pejabat_desa = '$id_pejabat_desa' AND surat_rekomendasi.id_rekomendasi='$id'");
		while ($rowss = mysqli_fetch_array($qCekPejabatDesa)) {
?>

			<html>

			<head>
				<link rel="shortcut icon" href="../../../../assets/img/logo-kua-remove.png">
				<title>CETAK SURAT</title>
				<link href="../../../../assets/formsuratCSS/formsurat.css" rel="stylesheet" type="text/css" />
				<style type="text/css" media="print">
					@page {
						margin: 0;
					}

					body {
						margin: 1cm;
						margin-left: 2cm;
						margin-right: 2cm;
						font-family: "Times New Roman", Times, serif;
					}
				</style>
			</head>

			<body>	
				<div>
					<table width="100%">
						<tr><img src="../../../../assets/img/logo-kua-remove.png" alt="" class="logo"></tr>
						<div class="header">
							<h5 class="kop" style="text-transform: uppercase">KEMENTERIAN AGAMA REPUBLIK INDONESIA</h5>
							<h5 class="kop" style="text-transform: uppercase">KANTOR KEMENTERIAN AGAMA KABUPATEN CIAMIS</h5>
							<h5 class="kop" style="text-transform: uppercase">KANTOR URUSAN AGAMA KECAMATAN PANJALU</h5>
							<h6 class="kop2" style="text-transform: capitalize;">Jl. Garahang Ciater - Panjalu. 46264</h6>
							<div style="text-align: center;">
								<hr>
							</div>
						</div>
						<br>
					</table>
					<br>
					<table width="60%" style="text-transform: capitalize;">
							<tr>
								<td class="indentasi">Nomor</td>
								<td>:</td>
								<td><?php echo $row['no_surat']; ?></td>
							</tr>
							<tr>
								<td class="indentasi">Nomor Pendaftaran</td>
								<td>:</td>
								<td style="text-transform: uppercase;"><?php echo $row['no_pendaftaran']; ?></td>
							</tr>
							<tr>
								<td class="indentasi">Lampiran</td>
								<td>:</td>
								<td><?php echo $row['lampiran'] . " BERKAS"; "BERKAS"?></td>
							</tr>
							<tr>
								<td class="indentasi">Perihal</td>
								<td>:</td>
								<td style="text-transform: uppercase;"><?php echo $row['jenis_surat']; ?></td>
							</tr>
						</table><br>
					
					<div class="clear"></div>
					<div id="isi3">
					<table width="100%">
							<tr>
							<td class="indentasi"><b>Berdasarkan Peraturan Menteri Agama Nomor 20 Tahun 2019 tentang Pencatatan Pernikahan, telah datang ke kantor kami seorang Laki - Laki
							</td>
							</tr>
						</table>
						<table width="100%" style="text-transform: capitalize;">
							<tr>
								<td class="indentasi">NIK</td>
								<td>:</td>
								<td><?php echo $row['nik']; ?></td>
							</tr>	
							<tr>
								<td width="30%" class="indentasi">Nama</td>
								<td width="2%">:</td>
								<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
							</tr>
							<tr>
								<td class="indentasi">Bin / Binti</td>
								<td>:</td>
								<td><?php echo $row['nama_ayah']; ?></td>
							</tr>
							
							<?php
							$tgl_lhr = date($row['tgl_lahir']);
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
							<tr>
								<td class="indentasi">Tempat / Tanggal Lahir</td>
								<td>:</td>
								<td><?php echo $row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?></td>
							</tr>
							<?php
							$tgl_lahir = new DateTime($row['tgl_lahir']);
							$tgl_hari_ini = new DateTime();
							$umur = $tgl_hari_ini->diff($tgl_lahir);
							?>
							<tr>
								<td class="indentasi">Jenis Kelamin</td>
								<td>:</td>
								<td><?php echo $row['jenis_kelamin']; ?></td>
							</tr>
							<tr>
								<td class="indentasi">Warga Negara</td>
								<td>:</td>
								<td style="text-transform: uppercase;"><?php echo $row['kewarganegaraan']; ?></td>
							</tr>
							<tr>
								<td class="indentasi">Agama</td>
								<td>:</td>
								<td><?php echo $row['agama']; ?></td>
							</tr>
							<tr>
								<td class="indentasi">Pekerjaan</td>
								<td>:</td>
								<td><?php echo $row['pekerjaan']; ?></td>
							</tr>
							<tr>
								<td class="indentasi">Alamat</td>
								<td>:</td>
								<td><?php echo $row['jalan'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", " . $row['kabupaten']; ?></td>
							</tr>
							<tr>
								<td class="indentasi">Status Perkawinan</td>
								<td>:</td>
								<td><?php echo $row['status_perkawinan']; ?></td>
							</tr>
						</table><br>
						<table width="100%">
							<tr>
							<td class="indentasi"><b>Akan melaksanakan pernikahan di wilayah Saudara dengan seorang Perempuan
							</td>
							</tr>
						</table>
						<table width="100%" style="text-transform: capitalize;">
							<tr>
								<td class="indentasi">NIK</td>
								<td>:</td>
								<td><?php echo $row['nik_per']; ?></td>
							</tr>	
							<tr>
								<td width="30%" class="indentasi">Nama</td>
								<td width="2%">:</td>
								<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama_per']; ?></td>
							</tr>
							<tr>
								<td class="indentasi">Bin / Binti</td>
								<td>:</td>
								<td><?php echo $row['nama_ayah_per']; ?></td>
							</tr>
							
							<?php
							$tgl_lhr = date($row['tgl_lahir_per']);
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
							<tr>
								<td class="indentasi">Tempat / Tanggal Lahir</td>
								<td>:</td>
								<td><?php echo $row['tempat_lahir_per'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?></td>
							</tr>
							<?php
							$tgl_lahir = new DateTime($row['tgl_lahir']);
							$tgl_hari_ini = new DateTime();
							$umur = $tgl_hari_ini->diff($tgl_lahir);
							?>
							<tr>
								<td class="indentasi">Jenis Kelamin</td>
								<td>:</td>
								<td><?php echo $row['jenis_kelamin_per']; ?></td>
							</tr>
							<tr>
								<td class="indentasi">Warga Negara</td>
								<td>:</td>
								<td style="text-transform: uppercase;"><?php echo $row['kewarganegaraan_per']; ?></td>
							</tr>
							<tr>
								<td class="indentasi">Agama</td>
								<td>:</td>
								<td><?php echo $row['agama_per']; ?></td>
							</tr>
							<tr>
								<td class="indentasi">Pekerjaan</td>
								<td>:</td>
								<td><?php echo $row['pekerjaan_per']; ?></td>
							</tr>
							<tr>
								<td class="indentasi">Alamat</td>
								<td>:</td>
								<td><?php echo $row['alamat_per']; ?></td>
							</tr>
							<tr>
								<td class="indentasi">Status Perkawinan</td>
								<td>:</td>
								<td><?php echo $row['status_perkawinan_per']; ?></td>
							</tr>
						</table><br>
						<table width="100%">
							<tr>
							<td class="indentasi"><b>Berdasarkan persyaratan yang telah ditentukan dalam PMA Nomor 20 Tahun 2019 kami lampirkan persyaratan permohonan pendaftaran kehendak pernikahan.
							</td>
							</tr>
						</table>
					</div>
					<br>
					<table width="100%" style="text-transform: capitalize;">
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr>
							<td width="10%"></td>
							<td width="30%"></td>
							<td width="10%"></td>
							<td align="center">
								Kepala/Penghulu
							</td>
						</tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr></tr>
						<tr>
							<td></td>
							<td align="center" style="text-transform: uppercase"><b><u></u></b></td>
							<td></td>
							<td align="center" style="text-transform: uppercase"><b><u><?php echo $rowss['nama_pejabat_desa']; ?></u></b></td>
						</tr>
				</div>
				<script>
					window.print();
				</script>
			</body>

			</html>

<?php
		}
	}
}
?>