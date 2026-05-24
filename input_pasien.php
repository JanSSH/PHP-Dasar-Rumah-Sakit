<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Pasien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="content">
        <h1>Input Data Pasien</h1>

        <div class="flex-box">
            <div class="form-box">

                <form action="simpan_pasien.php" method="POST">
                    <label for="nama_pasien">Nama Pasien:</label>
                    <input type="text" id="nama_pasien" name="nama_pasien" required><br><br>

                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select><br><br>

                    <label for="alamat">Alamat:</label>
                    <textarea id="alamat" name="alamat" required></textarea><br><br>

                    <label for="tgl_lahir">Tanggal Lahir:</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" required><br><br>

                    <input type="submit" value="Simpan">
                </form>
            </div>

            <div class="table-box">
                <h2>Data Pasien</h2>
                <table border="1">
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    // Koneksi ke database
                    $conn = new mysqli("localhost", "root", "", "data_rs");

                    // Cek koneksi
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Query untuk mengambil data pasien
                    $sql = "SELECT * FROM pasien";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $no = 1;
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $row["nama_pasien"] . "</td>";
                            echo "<td>" . $row["jenis_kelamin"] . "</td>";
                            echo "<td>" . $row["alamat_pasien"] . "</td>";
                            echo "<td>" . $row["tgl_lahir"] . "</td>";
                            echo "<td> <a class='btn-hapus' href='hapus_pasien.php?id=".$row['id_pasien']."' onclick='return confirm(\"Yakin hapus?\")'> Hapus </a> </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Tidak ada data pasien</td></tr>";
                    }

                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>