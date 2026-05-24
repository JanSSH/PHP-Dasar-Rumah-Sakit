<?php

$conn = new mysqli("localhost","root","","data_rs");

$id_poli = $_GET['id_poli'];

$sql = "SELECT * FROM dokter WHERE id_poli='$id_poli'";

$result = $conn->query($sql);

echo "<option value=''>-- Pilih Dokter --</option>";

while($row = $result->fetch_assoc()) {

    echo "<option value='".$row['id_dokter']."'>
            ".$row['nama_dokter']."
          </option>";
}
?>