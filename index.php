<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Form Input Guru dan Siswa</title>
</head>

<body>

    <div class="container">
        <div class="content-text">
            <h1>SMK ADI ASNGGORO</h1>
            <p>Tahun Pelajaran 20244 - 2025</p>
        </div>
    </div>

    <div class="container">
        <form class="form-guru" action="" method="POST">
            <div class="form-group">
                <label for="">Guru</label>
                <input type="text" name="guru" placeholder="Masukan Nama Guru" required>
            </div>
            <div class="form-group">
                <label for="">Mapel</label>
                <input type="text" name="mapel" placeholder="Masukan Mata Pelajaran" required>
            </div>
            <div class="form-group">
                <label for="">KKM</label>
                <input type="text" name="kkm" placeholder="Masukan KKM" required>
            </div>
            <div class="form-group">
                <label for="">Kelas</label>
                <select name="kelas" required>
                    <option value="">Nama Kelas</option>
                    <option value="1">XII RPL 1</option>
                    <option value="2">XII RPL 2</option>
                </select>
            </div>
            <div class="submit-form-group">
                <input type="submit" name="ok" value="Submit">
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['ok'])) {
        $guru = $_POST['guru'];
        $mapel = $_POST['mapel'];
        $kkm = $_POST['kkm'];
        $kelas = $_POST['kelas'];

        if ($kelas == 1) {
            $siswa = array(
                [123456789, "Haikal"],
                [987654321, "Aldi"],
                [867829933, "Naufal"]
            );
            $kelas = 'XII RPL 1';
            
        } else if ($kelas == 2) {
            $siswa = array(
                [5544332211, "Rama"],
                [5544332212, "Algi"],
                [5544332213, "Evan"]
            );
            $kelas = 'XII RPL 2';
        }
        ?>

    <div class="container-nilai">
        <form action="data_nilai.php" method="POST">
            <input type="hidden" name="guru" value="<?= $guru ?>" readonly>
            <input type="hidden" name="mapel" value="<?= $mapel ?>" readonly>
            <input type="hidden" name="kkm" value="<?= $kkm ?>" readonly>
            <input type="hidden" name="kelas" value="<?= $kelas ?>" readonly>

            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Nilai</th>
                </tr>
                <?php
                $no = 1;
                foreach ($siswa as $v) {
                    ?>
                <tr class="input-nilai">
                    <td><?= $no; ?></td>
                    <td><input type="text" name="nis[]" value="<?= $v[0]; ?>" readonly></td>
                    <td><input type="text" name="nama[]" value="<?= $v[1]; ?>" readonly></td>
                    <td><input type="number" name="nilai[]" placeholder="Masukan Nilai" min="0" max="100" required></td>
                </tr>
                <?php
                    $no++;
                }
                ?>
            </table>
            <div class="submit-nilai">
                <input type="submit" name="submit-nilai" value="Kirim Nilai">
            </div>
        </form>
        <?php
    }
    ?>
    </div>
</body>

</html>