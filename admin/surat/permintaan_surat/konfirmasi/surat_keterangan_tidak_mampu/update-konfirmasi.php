<?php
	include ('../../../../../config/koneksi.php');

	$id 				= $_POST['id'];
	$no_surat 			= $_POST['fno_surat'];
	$id_pejabat_desa 	= $_POST['ft_tangan'];
	$status_surat 		= "SELESAI";

	$qUpdate 	= "UPDATE surat_keterangan_tidak_mampu SET no_surat='$no_surat', id_pejabat_desa='$id_pejabat_desa', status_surat='$status_surat' WHERE id_sktm='$id'";
	$update 	= mysqli_query($connect, $qUpdate);

	if($update){
		header('location:../../../surat_selesai/index.php');
	}else{
	 	echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengonfirmasi surat'); window.location.href='#'</script>");
	}
?>