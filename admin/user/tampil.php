<div class="col-md-12">
    <h2 data-aos="fade-right">Tabel Pengguna</h2>
    <!-- Tombol tambah data -->
    <a href="?page=user/tambah_data.php" class="btn btn-success mb-3" data-aos="fade-right">Tambah Data</a>

    <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">level</th>
                <th scope="col">Edit/Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = mysqli_query($db, "SELECT * FROM user");
                $no=1;
                while ($ambil_data = mysqli_fetch_assoc($sql)) {
                    $id_user = $ambil_data['id_user'];
                    $username = $ambil_data['username'];
                    $password = $ambil_data['password'];
                    $nama = $ambil_data['nama'];
                    $level = $ambil_data['level'];
            ?>
            <tr>
                <th scope="row"><?=$no++?></th>
                <td><?=$nama?></td>
                <td><?=$level?></td>
                <td>
                    <a href="?page=user/edit.php&id=<?= $id_user ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                    <a href="?page=user/delete.php&id=<?= $id_user ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>