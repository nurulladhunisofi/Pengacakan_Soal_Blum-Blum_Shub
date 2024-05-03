<?php
    include '../koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username != "" && $password != "") {
        $login = mysqli_query($db, "SELECT * FROM user WHERE username='$username' AND password='$password' ");
        $cek_login = mysqli_num_rows($login);
        $ambil_data = mysqli_fetch_assoc($login);
        $id_user = $ambil_data['id_user'];
        $nama = $ambil_data['nama'];
        $level = $ambil_data['level'];
        $token = $ambil_data['token'];
        if ($cek_login > 0) {
            //kalau ada akunnya
            if ($level == "Admin") {
                session_start();
                $_SESSION['id_user'] = $id_user;
                $_SESSION['nama'] = $nama;
                $_SESSION['username'] = $username;
                $_SESSION['token'] = $token;
                $_SESSION['status'] = "login_admin";
                
                echo"
                <script>
                    alert('Login Berhasil ');
                    window.location.href = '../admin/';
                </script>
                ";
            }else {
                session_start();
                $_SESSION['id_user'] = $id_user;
                $_SESSION['nama'] = $nama;
                $_SESSION['username'] = $username;
                $_SESSION['status'] = "login_user";
                $_SESSION['token'] = $token;
                echo"
                <script>
                    alert('Login Berhasil ');
                    window.location.href = '../index.php';
                </script>
                ";
            }

        }else {
            //tidak ada akun
            echo"
            <script>
                alert('Login Gagal ');
                window.location.href = 'login.php';
            </script>
            ";
        }
    }else {
        echo"
        <script>
            alert('Lengkapi Form');
            window.location.href = 'login.php';
        </script>
        ";
    }
?>