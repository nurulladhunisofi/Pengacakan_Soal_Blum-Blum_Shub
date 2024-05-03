<?php
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM soal WHERE id_soal=$id");
     if ($hapus = true) {
        echo"
        <script>
            alert('Delete berhasil');
            window.location.href = '?page=ujian/tampil.php';
        </script>
        ";
     }else {
        echo"
        <script>
            alert('Delete Gagal');
            window.location.href = '?page=ujian/tampil.php';
        </script>
        ";
     }
?>