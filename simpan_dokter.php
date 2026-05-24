<?php
    include 'koneksi.php';
        $nama_dokter = $_POST['nama_dokter'];
        $id_poli = $_POST['nama_poli'];
        
        $simpan = mysqli_query($konek, "INSERT INTO dokter (nama_dokter, id_poli) VALUES ('$nama_dokter', '$id_poli')");
    
        if($simpan){
            echo "
                <script>
                    alert('Data Berhasil Disimpan') ;
                    window.parent.frames['content'].location.href='input_dokter.php';
                </script>";
        }else{
            echo "
                <script>
                    alert('Data Gagal Disimpan');
                    window.parent.frames['content'].location.href='input_dokter.php';
                </script>" ;
        }
?>