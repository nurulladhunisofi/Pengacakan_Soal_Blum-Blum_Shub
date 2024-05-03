<?php
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM user WHERE id_user=$id");
     if ($hapus = true) {
        echo"
        <script>
            alert('Delete berhasil');
            window.location.href = '?page=user/tampil.php';
        </script>
        ";
     }else {
        echo"
        <script>
            alert('Delete Gagal');
            window.location.href = '?page=user/tampil.php';
        </script>
        ";
     }
?>