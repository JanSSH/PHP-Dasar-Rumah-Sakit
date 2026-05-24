<?php
    include 'koneksi.php';
        $tgl_pendaftaran = $_POST['tgl_pendaftaran'];
        $id_pasien = $_POST['id_pasien'];
        $id_poli = $_POST['id_poli'];
        $id_dokter = $_POST['id_dokter'];
        
        $simpan = mysqli_query($konek, "INSERT INTO pendaftaran (tgl_pendaftaran, id_pasien, id_poli, id_dokter) VALUES ('$tgl_pendaftaran', '$id_pasien', '$id_poli', '$id_dokter')");
    
        if($simpan){
            echo "
                <script>
                    alert('Data Berhasil Disimpan') ;
                    window.parent.frames['content'].location.href='input_pendaftaran.php' ;
                </script>";
        }else{
            echo "
                <script>
                    alert('Data Gagal Disimpan');
                    window.parent.frames['content'].location.href='input_pendaftaran.php';
                </script>" ;
        }

?>