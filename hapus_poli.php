<?php

include 'koneksi.php';

$id = $_GET['id'];

$hapus = mysqli_query(
    $konek,
    "DELETE FROM poli
     WHERE id_poli='$id'"
);

if($hapus){

    echo "
    <script>

        alert('Data Berhasil Dihapus');

        window.parent.frames['content'].location.href =
        'input_poli.php';

    </script>
    ";

}else{

    echo "
    <script>

        alert('Data Gagal Dihapus');

        window.parent.frames['content'].location.href =
        'input_poli.php';

    </script>
    ";
}

?>