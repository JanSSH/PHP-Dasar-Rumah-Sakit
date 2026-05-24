<?php
    include 'koneksi.php';
        $nama_poli = $_POST['nama_poli'];
        
        $simpan = mysqli_query($konek, "INSERT INTO poli (nama_poli) VALUES ('$nama_poli')");
    
        if($simpan){
            echo "
                <script>
                    alert('Data Berhasil Disimpan') ;
                    window.parent.frames['content'].location.href='input_poli.php' ;
                </script>";
        }else{
            echo "
                <script>
                    alert('Data Gagal Disimpan');
                    window.parent.frames['content'].location.href='input_poli.php';
                </script>" ;
        }

?>