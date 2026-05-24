<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dokter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <div class="content">
        <h1>Input Data Dokter</h1>

        <div class="flex-box">
            <div class="form-box">

                <form action="simpan_dokter.php" method="POST">

                    <label for="nama_dokter">Nama Dokter:</label>
                    <input type="text" id="nama_dokter" name="nama_dokter" required><br><br>

                    <label for="nama_poli">Nama Poli:</label>
                    <select id="nama_poli" name="nama_poli" required>
                        <option value="">Pilih Poli</option>
                        <?php
                        // Koneksi ke database
                        $conn = new mysqli("localhost", "root", "", "data_rs");

                        // Cek koneksi
                        if ($conn->connect_error) {
                            die("Koneksi gagal: " . $conn->connect_error);
                        }

                        // Query untuk mengambil data poli
                        $sql = "SELECT id_poli, nama_poli FROM poli";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["id_poli"] . "'>" . $row["nama_poli"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>Tidak ada data poli</option>";
                        }

                        // Tutup koneksi
                        $conn->close();
                        ?>
                    </select><br><br>

                    <input type="submit" value="Simpan">
                </form>
            </div>

            <div class="table-box">
                <h2>Data Dokter</h2>
                <table border="1">
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
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

                    // Query untuk mengambil data dokter
                    $sql = "SELECT d.*, p.nama_poli FROM dokter d LEFT JOIN poli p ON d.id_poli = p.id_poli";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $no = 1;
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $row["nama_dokter"] . "</td>";
                            echo "<td>" . $row["nama_poli"] . "</td>";
                            echo "<td> <a class='btn-hapus' href='hapus_dokter.php?id=".$row['id_dokter']."' onclick='return confirm(\"Yakin hapus?\")'> Hapus </a> </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada data dokter</td></tr>";
                    }

                    // Tutup koneksi
                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>