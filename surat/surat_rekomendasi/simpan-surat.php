<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Rekomendasi";
        $nik = $_POST['fnik'];
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $nik_per = addslashes($_POST['nik_per']);
        $nama_per = addslashes($_POST['nama_per']);
        $nama_ayah_per = addslashes($_POST['binti_per']);
        $tempat_lahir_per = addslashes($_POST['tempat_per']);
        $tgl_lahir_per = addslashes($_POST['tanggal_per']);
        $jenis_kelamin_per = addslashes($_POST['jk_per']);
        $kewarganegaraan_per = addslashes($_POST['kewarganegaraan_per']);
        $agama_per = addslashes($_POST['agama_per']);
        $pekerjaan_per = addslashes($_POST['pekerjaan_per']);
        $alamat_per = addslashes($_POST['alamat_per']);
        $status_perkawinan_per = addslashes($_POST['status_per']);

       /*  $qTambahSurat = "INSERT INTO calon_perempuan (nik_per, nama_per, nama_ayah_per, tempat_lahir_per, tgl_lahir_per, jenis_kelamin_per, kewarganegaraan_per, agama_per, pekerjaan_per, alamat_per, status_perkawinan_per) VALUES ('$nik_per', '$nama_per', '$nama_ayah_per', '$tempat_lahir_per', '$tgl_lahir_per', '$jenis_kelamin_per', '$kewarganegaraan_per', '$agama_per', '$pekerjaan_per', '$alamat_per', '$status_perkawinan_per')";
        
        $qTambahSurat = "INSERT INTO surat_rekomendasi (jenis_surat, nik, status_surat, id_profil_desa) VALUES ('$jenis_surat', '$nik', '$status_surat', '$id_profil_desa')"; */

        mysqli_autocommit($connect, FALSE);
        $qTambahSurat = "INSERT INTO surat_rekomendasi (jenis_surat, nik, status_surat, id_profil_desa) VALUES ('$jenis_surat', '$nik', '$status_surat', '$id_profil_desa')";
        if (mysqli_query($connect, $qTambahSurat) === TRUE) {
          $postId = mysqli_insert_id($connect);
            $qTambahCalonPerempuan = "INSERT INTO calon_perempuan (nik, nik_per, nama_per, nama_ayah_per, tempat_lahir_per, tgl_lahir_per, jenis_kelamin_per, kewarganegaraan_per, agama_per, pekerjaan_per, alamat_per, status_perkawinan_per) VALUES ('$nik_per', '$nama_per', '$nama_ayah_per', '$tempat_lahir_per', '$tgl_lahir_per', '$jenis_kelamin_per', '$kewarganegaraan_per', '$agama_per', '$pekerjaan_per', '$alamat_per', '$status_perkawinan_per')";
           mysqli_query($connect, $qTambahCalonPerempuan );
        }
        if (!mysqli_commit($connect)) { //commit transaction
           print("Table saving failed");
            exit();
        }

        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");

        
    }
?>