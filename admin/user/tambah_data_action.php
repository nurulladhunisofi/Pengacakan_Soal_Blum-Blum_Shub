<?php
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    $username = substr(uniqid(), 0, 30);    
    $password = substr(uniqid(), 0, 10);
    $nama = $_POST['nama'];
    $level = $_POST['level'];
    // $token = "FLOOR(POW(10, 4 + RAND() * 6))";echo $token = 
    if ($username != "" && $password != "" && $nama != "" && $level != "") {
        $sql = mysqli_query($db, "INSERT INTO user (username, password, nama, token, level) 
        VALUES ('$username', '$password', '$nama', FLOOR(POW(10, 4 + RAND() * 6)), '$level')
        ");
        echo"
        <script>
            alert('Insert berhasil');
            window.location.href = '?page=user/tampil.php';
        </script>
        ";
    }else {
        echo"
        <script>
            alert('Insert gagal');
            window.location.href = '?page=user/tambah_data.php';
        </script>
        ";
    }
?>