<?php
    $id = $_GET['id'];
    $sql = mysqli_query($db, "SELECT * FROM user WHERE id_user = $id");
    $ambil_data = mysqli_fetch_assoc($sql);
    $username = $ambil_data['username'];
    $password = $ambil_data['password'];
    $nama = $ambil_data['nama'];
    $level = $ambil_data['level'];
?>
<div class="col-md-12">
    <h1 class="mb-4 text-center">Edit User</h1>
    <div class="card shadow p-4">
        <form action="?page=user/edit_action.php" method="POST">
            <!-- Sembunyikan input id -->
            <input name="id" value="<?=$id?>" type="hidden">

            <!-- Input Username -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input value="<?=$username?>" name="username" type="text" class="form-control" id="username" aria-describedby="usernameHelp" required>
            </div>

            <!-- Input Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input value="<?=$password?>" name="password" type="password" class="form-control" id="inputPassword4" aria-describedby="passwordHelp" required>
               
                <input class="form-check-input ml-2" onclick="myFunction()" type="checkbox" id="gridCheck">
                <label class="form-check-label ml-4" for="gridCheck">
                    Lihat Password
                </label>
            </div>

            <!-- Input Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input value="<?=$nama?>" name="nama" type="text" class="form-control" id="nama" aria-describedby="namaHelp" required>
            </div>

            <!-- Dropdown Level -->
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-control" name="level" id="level" required>
                    <option value="">Pilih Level</option>
                    <option <?php if ($level == "Admin") echo "selected"; ?> value="Admin">Admin</option>
                    <option <?php if ($level == "User") echo "selected"; ?> value="User">User</option>
                </select>
            </div>

            <!-- Tombol Submit -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
