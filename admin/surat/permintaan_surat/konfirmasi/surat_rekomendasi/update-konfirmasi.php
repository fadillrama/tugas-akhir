<?php
	include ('../../../../../config/koneksi.php');

	$id 				= $_POST['id'];
	$no_surat 			= $_POST['fno_surat'];
	$no_pendaftaran		= $_POST['fno_pendaftaran'];
	$lampiran			= $_POST['flampiran'];
	$id_pejabat_desa 	= $_POST['ft_tangan'];
	$status_surat 		= "SELESAI";

	$qUpdate 	= "UPDATE surat_rekomendasi SET no_surat='$no_surat', no_pendaftaran='$no_pendaftaran', lampiran='$lampiran', id_pejabat_desa='$id_pejabat_desa', status_surat='$status_surat' WHERE id_rekomendasi='$id'";
	$update 	= mysqli_query($connect, $qUpdate);

	if($update){
		header('location:../../../surat_selesai/index.php');
	}else{
	 	echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengonfirmasi surat'); window.location.href='#'</script>");
	}
?>