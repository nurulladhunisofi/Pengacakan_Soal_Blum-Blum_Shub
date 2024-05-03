<?php
    include '../koneksi.php';
    session_start();
    if ($_SESSION['status'] != "login_admin") {
        header('location:../login/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard Admin</title>
    <!-- datatables -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        /* Gaya footer */
        footer {
            padding: 10px; /* Memberikan padding */
            margin-top: 5vh; /* Memberikan margin di atas footer */
            color: grey; /* Memberikan warna abu-abu (grey) */
        }
        body, nav ,input, button {
            font-family: 'Poppins', sans-serif;
            background-color: #D6DAC8;
        }

        a.nav-link:hover {
            color: #007bff; /* Warna teks saat dihover */
            border-bottom: 2px solid ; /* Border tipis biru pada bagian bawah menu */
        }

        /* Efek aktif pada menu */
        a.nav-link.active {
            color: #007bff; /* Warna teks saat aktif */
            border-bottom: 2px solid #ffff; /* Border tipis biru pada bagian bawah menu aktif */
        }
        nav.navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow lembut */
        }

                /* Tombol "Simpan" dengan efek hover */
        .btn-primary {
            background-color: #6DA4AA; /* Warna latar belakang default */
            color: white; /* Warna teks default */
            border-radius: 8px; /* Membentuk tombol melengkung */
            padding: 10px 20px; /* Memberikan padding untuk tombol */
            border: none; /* Menghapus border default */
            transition: all 0.3s ease; /* Mengatur transisi yang halus */
            box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.2); /* Efek bayangan ringan */
            cursor: pointer; /* Mengubah kursor menjadi pointer saat hover */
        }

        /* Efek hover untuk tombol "Simpan" */
        .btn-primary:hover {
            background-color: #A1EEBD; /* Warna latar belakang saat dihover */
            color: #333; /* Warna teks saat dihover */
            box-shadow: 4px 8px 12px rgba(0, 0, 0, 0.2); /* Efek bayangan lebih kuat saat dihover */
            transform: scale(1.05); /* Sedikit memperbesar tombol saat dihover */
        }
    </style>
</head>
<body >
    <nav class="navbar navbar-expand-md  sticky-top" style="background-color : #B2A59B"  >
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color : #ffff"><h3><b>Dashboard Admin | </b></h3></a>
            <a class="navbar-brand" href="#">Pengguna  <b>"<?=$_SESSION['nama']?>"</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" >
            <ul class="navbar-nav ms-auto">
            <li class="nav-item" >
                <!-- Periksa jika 'page' adalah 'user/tampil.php' untuk menentukan menu 'User' yang aktif -->
                <a class="nav-link  <?= isset($_GET['page']) && $_GET['page'] === 'user/tampil.php' ? 'active' : '' ?>" href="?page=user/tampil.php" style="color : #ffff">User</a>
            </li>
            <li class="nav-item">
                <!-- Periksa jika 'page' adalah 'ujian/tampil.php' untuk menentukan menu 'Ujian' yang aktif -->
                <a class="nav-link <?= isset($_GET['page']) && $_GET['page'] === 'ujian/tampil.php' ? 'active' : '' ?>" href="?page=ujian/tampil.php" style="color : #ffff">Ujian</a>
            </li>
            <li class="nav-item">
                <!-- Logout menu tidak perlu memeriksa 'page' karena tidak terkait dengan halaman tertentu -->
                <a class="nav-link" href="../login/logout.php"style="color : #ffff">Logout</a>
            </li>
        </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php
                if ($_GET) {
                    $page = $_GET['page'];
                    include $page;
                }else{
                    include 'user/tampil.php';
                }
            ?>
        </div>
        <!-- Footer -->
        <footer class="text-center" data-aos="fade-right">
            <hr>
            Admin pengacakan soal blum blum shub @copyright: Kelompok 6
        </footer>

    </div>
    <!-- datatables -->
    <script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, /* Durasi animasi dalam milidetik */
            easing: 'ease-in-out', /* Efek easing */
            once: true /* Animasi hanya sekali saat di-scroll */
        });
    </script>
    <!-- show password -->
    <script src="include/no_hidden_password.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
