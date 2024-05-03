<?php
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];


    if ($username != "" && $password != "" && $nama != "" && $level != "") {
        $sql = mysqli_query($db, "UPDATE user SET username='$username', password='$password', nama='$nama', level='$level' WHERE id_user='$id'");
        echo"
        <script>
            alert('Edit berhasil');
            window.location.href = '?page=user/tampil.php';
        </script>
        ";
    }else {
        echo"
        <script>
            alert('Edit gagal');
            window.location.href = '?page=user/edit.php&id=$id';
        </script>
        ";
    }
?>