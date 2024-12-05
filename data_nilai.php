<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_POST['submit-nilai'])) {
            echo "<div class='data-display'>";
            echo "<h2>Informasi Pengajaran</h2>";
            echo "<p><strong>Nama Guru:</strong> " . ($_POST['guru']) . "</p>";
            echo "<p><strong>Mapel:</strong> " . ($_POST['mapel']) . "</p>";
            echo "<p><strong>KKM:</strong> " . ($_POST['kkm']) . "</p>";
            echo "<p><strong>Kelas:</strong> " . ($_POST['kelas']) . "</p>";

            if (isset($_POST['nis'], $_POST['nama'], $_POST['nilai'])) {
                $nis = $_POST['nis'];
                $nama = $_POST['nama'];
                $nilai = $_POST['nilai'];
                $kkm = $_POST['kkm'];
                $kelas = $_POST['kelas'];
                $n = count($nis);
                ?>
        <div class="nilai-container">
            <h3>Data Nilai Siswa</h3>
            <table border="1" class="nilai-table" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $no = 1;
                            for ($i = 0; $i < $n; $i++) {
                                // Tentukan keterangan berdasarkan nilai KKM
                                $keterangan = $nilai[$i] >= $kkm ? "KKM" : "Tidak KKM";
                                echo "<tr>
                            <td>{$no}</td>
                            <td>" . htmlspecialchars($nis[$i]) . "</td>
                            <td>" . htmlspecialchars($nama[$i]) . "</td>
                            <td>" . htmlspecialchars($nilai[$i]) . "</td>
                            <td>{$keterangan}</td>
                        </tr>";
                                $no++;
                            }
                            ?>
                </tbody>
            </table>
        </div>
        <?php
            } else {
                echo "<p>Data siswa tidak tersedia.</p>";
            }
            echo "</div>";
        } else {
            echo "<p>Aksi tidak valid.</p>";
        }
        ?>
    </div>
</body>

</html>