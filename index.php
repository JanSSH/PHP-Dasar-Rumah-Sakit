<!DOCTYPE html>
<html>
<head>
    <title>Sistem Rumah Sakit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h2>Rumah Sakit Demam</h2>

        <h3>INPUT DATA</h3>

        <a href="input_dokter.php" target="content">
            Input Dokter
        </a>

        <a href="input_pasien.php" target="content">
            Input Pasien
        </a>

        <a href="input_poli.php" target="content">
            Input Poli
        </a>

        <a href="input_pendaftaran.php" target="content">
            Input Pendaftaran
        </a>

    </div>

    <!-- CONTENT -->
    <div class="content">

        <iframe
            name="content"
            src="home.php"
            width="100%"
            height="100%"
            frameborder="0">
        </iframe>

    </div>

</div>

</body>
</html>