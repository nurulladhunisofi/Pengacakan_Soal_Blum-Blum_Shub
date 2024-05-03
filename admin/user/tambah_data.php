<div class="col-md-12" >
    <h1 class="mb-4 text-center">Tambah Pengguna</h1>
    <div class="card shadow p-4">
        <form action="?page=user/tambah_data_action.php" method="POST">
             <!-- <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input name="password" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div> -->
            <!-- Input Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input name="nama" type="text" class="form-control" id="nama" aria-describedby="namaHelp" required>
            </div>

            <!-- Dropdown Level -->
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-control" name="level" id="level" required>
                    <option value="">Pilih Level</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
            </div>

            <!-- Tombol Submit -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
