<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Poli</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="content">
        <h1>Input Data Poli</h1>

        <div class="flex-box">
            <div class="form-box">

                <form action="simpan_poli.php" method="POST">
                    <label for="nama_poli">Nama Poli:</label>
                    <input type="text" id="nama_poli" name="nama_poli" required><br><br>

                    <input type="submit" value="Simpan">
                </form>
            </div>

            <div class="table-box">
                <h2>Data Poli</h2>
                <table border="1">
                    <tr>
                        <th>No</th>
                        <th>Nama Poli</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                    // Koneksi ke database
                    $conn = new mysqli("localhost", "root", "", "data_rs");

                    // Cek koneksi
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM poli";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $no = 1;
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $row["nama_poli"] . "</td>";
                            echo "<td> <a class='btn-hapus' href='hapus_poli.php?id=".$row['id_poli']."' onclick='return confirm(\"Yakin hapus?\")'> Hapus </a> </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                    }

                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>