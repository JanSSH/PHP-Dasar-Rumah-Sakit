<?php

include 'koneksi.php';

$id = $_GET['id'];

$hapus = mysqli_query(
    $konek,
    "DELETE FROM pendaftaran
     WHERE id_pendaftaran='$id'"
);

if($hapus){

    echo "
    <script>

        alert('Data Berhasil Dihapus');

        window.parent.frames['content'].location.href =
        'input_pendaftaran.php';

    </script>
    ";

}else{

    echo "
    <script>

        alert('Data Gagal Dihapus');

        window.parent.frames['content'].location.href =
        'input_pendaftaran.php';

    </script>
    ";
}

?>