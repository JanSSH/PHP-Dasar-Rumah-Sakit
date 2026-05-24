<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="content">
        <h1>Input Data Pendaftaran</h1>
        
        <div class="flex-box">
            <div class="form-box">
                
                <form action="simpan_pendaftaran.php" method="POST">
                    <label for="tgl_pendaftaran">Tanggal Daftar:</label>
                    <input type="date" id="tgl_pendaftaran" name="tgl_pendaftaran" required><br><br>

                    <label for="nama_pasien">Nama Pasien:</label>
                    <select id="id_pasien" name="id_pasien" required>
                        <option value="">Pilih Pasien</option>
                        <?php
                        // Koneksi ke database
                        $conn = new mysqli("localhost", "root", "", "data_rs");

                        // Cek koneksi
                        if ($conn->connect_error) {
                            die("Koneksi gagal: " . $conn->connect_error);
                        }

                        // Query untuk mengambil data pasien
                        $sql = "SELECT id_pasien, nama_pasien FROM pasien";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["id_pasien"] . "'>" . $row["nama_pasien"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>Tidak ada data pasien</option>";
                        }

                        // Tutup koneksi
                        $conn->close();
                        ?>
                    </select><br><br>

                    <label for="nama_poli">Nama Poli:</label>
                    <select id="id_poli" name="id_poli" required>
                        <option value="">Pilih Poli</option>

                        <?php
                        $conn = new mysqli("localhost", "root", "", "data_rs");

                        $sql = "SELECT id_poli, nama_poli FROM poli";
                        $result = $conn->query($sql);

                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id_poli"] . "'>" . $row["nama_poli"] . "</option>";
                        }
                        ?>
                    </select><br><br>

                    <label>Nama Dokter</label>
                        <select id="id_dokter" name="id_dokter" required>
                            <option value="">Pilih Dokter</option>
                        </select><br><br>

                    <input type="submit" value="Simpan">
                </form>
            </div>

            <div class="table-box">
                <h2>Data Pendaftaran</h2>
                <table border="1">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pendaftaran</th>
                        <th>Nama Pasien</th>
                        <th>Nama Poli</th>
                        <th>Nama Dokter</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                    // Koneksi ke database
                    $conn = new mysqli("localhost", "root", "", "data_rs");
                    
                    // Cek koneksi
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    $sql = "SELECT p.*, ps.nama_pasien, pl.nama_poli, d.nama_dokter 
                            FROM pendaftaran p 
                            LEFT JOIN pasien ps ON p.id_pasien = ps.id_pasien 
                            LEFT JOIN poli pl ON p.id_poli = pl.id_poli 
                            LEFT JOIN dokter d ON p.id_dokter = d.id_dokter";
                    
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $no = 1;
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $row["tgl_pendaftaran"] . "</td>";
                            echo "<td>" . $row["nama_pasien"] . "</td>";
                            echo "<td>" . $row["nama_poli"] . "</td>";
                            echo "<td>" . $row["nama_dokter"] . "</td>";
                            echo "<td> <a class='btn-hapus' href='hapus_pendaftaran.php?id=".$row['id_pendaftaran']."' onclick='return confirm(\"Yakin hapus?\")'> Hapus </a> </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Tidak ada data pendaftaran</td></tr>";
                    }

                    // Tutup koneksi
                    $conn->close();
                    ?>
                </table>
            </div>
        </div>

    <script>
        document.getElementById("id_poli").addEventListener("change", function () {

            let id_poli = this.value;

            fetch("ambil_dokter.php?id_poli=" + id_poli)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("id_dokter").innerHTML = data;
                });

        });
    </script>
</body>
</html>