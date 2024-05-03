<div class="col-md-12">
    <h2>Tabel Soal Ujian</h2>
    <!-- Tombol tambah data -->
    <a href="?page=ujian/tambah_data.php" class="btn btn-success mb-3" data-aos="fade-right">Tambah Data</a>

    <!-- Tabel pengguna -->
    <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0" data-aos="fade-right">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Pertanyaan</th>
                <th scope="col">Pilihan Yang Benar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Ambil data dari database -->
            <?php
            // Query untuk mengambil data dari database
            $sql = mysqli_query($db, "SELECT * FROM soal");
            $no = 1;

            while ($ambil_data = mysqli_fetch_assoc($sql)) {
                $id_soal = $ambil_data['id_soal'];
                $pertanyaan = $ambil_data['pertanyaan'];
                $jawaban_a = $ambil_data['jawaban_a'];
                $jawaban_b = $ambil_data['jawaban_b'];
                $jawaban_c = $ambil_data['jawaban_c'];
                $jawaban_d = $ambil_data['jawaban_d'];
                $kunci_jawaban = $ambil_data['kunci_jawaban'];
            ?>
            <tr data-aos="fade-right">
                <th scope="row"><?= $no++ ?></th>
                <td><?= $pertanyaan ?></td>
                <td><?= $kunci_jawaban ?></td>
            <td>
                <div class="d-flex justify-content-between">
                    <a href="?page=ujian/edit.php&id=<?= $id_soal ?>" class="btn btn-warning btn-sm me-1">Edit</a>
                    <a href="?page=ujian/delete.php&id=<?= $id_soal ?>" class="btn btn-danger btn-sm ms-1">Delete</a>
                </div>
            </td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>