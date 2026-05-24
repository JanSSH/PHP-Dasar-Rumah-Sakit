<?php
    include 'koneksi.php';
        $nama_pasien = $_POST['nama_pasien'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat_pasien = $_POST['alamat'];
        $tgl_lahir = $_POST['tgl_lahir'];
        
        $simpan = mysqli_query($konek, "INSERT INTO pasien (nama_pasien, jenis_kelamin, alamat_pasien, tgl_lahir) VALUES ('$nama_pasien','$jenis_kelamin','$alamat_pasien','$tgl_lahir')");
    
        if($simpan){
            echo "
                <script>
                    alert('Data Berhasil Disimpan') ;
                    window.parent.frames['content'].location.href='input_pasien.php';
                </script>";
        }else{
            echo "
                <script>
                    alert('Data Gagal Disimpan');
                    window.parent.frames['content'].location.href='input_pasien.php';
                </script>" ;
        }
?>