<?php

include 'koneksi.php';

$id = $_GET['id'];

$hapus = mysqli_query(
    $konek,
    "DELETE FROM dokter
     WHERE id_dokter='$id'"
);

if($hapus){

    echo "
    <script>

        alert('Data Berhasil Dihapus');

        window.parent.frames['content'].location.href =
        'input_dokter.php';

    </script>
    ";

}else{

    echo "
    <script>

        alert('Data Gagal Dihapus');

        window.parent.frames['content'].location.href =
        'input_dokter.php';

    </script>
    ";
}

?>