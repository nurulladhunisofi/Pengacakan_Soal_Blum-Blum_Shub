<?php
session_start();
// Termasuk koneksi database
include 'koneksi.php';

// Inisialisasi skor
$skor = 0;

// Inisialisasi jumlah total soal
$jumlah_soal = 0;

// Query untuk mendapatkan jumlah total soal dari database
$sql_total_soal = "SELECT COUNT(*) as total_soal FROM soal";
$result_total_soal = mysqli_query($db, $sql_total_soal);
$row_total_soal = mysqli_fetch_assoc($result_total_soal);
$jumlah_soal = $row_total_soal['total_soal'];

// Periksa apakah jawaban dikirim oleh pengguna
if (isset($_POST['jawaban'])) {
    $jawabanUser = $_POST['jawaban'];

    // Periksa jawaban pengguna dan hitung skor
    foreach ($jawabanUser as $key => $value) {
        // Query untuk mendapatkan kunci jawaban dari database
        $sql = mysqli_query($db, "SELECT kunci_jawaban FROM soal WHERE id_soal = $key");
        $ambil_data = mysqli_fetch_assoc($sql);

        if ($ambil_data) {
            $kunci_jawaban = $ambil_data['kunci_jawaban'];

            // Periksa apakah jawaban pengguna benar
            if ($kunci_jawaban == $value) {
                $skor++; // Tambah skor jika jawaban benar
            }
        }
    }
}

// Hitung nilai siswa
$nilai_siswa = ($skor / $jumlah_soal) * 100;

// Tampilkan hasil ujian
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Ujian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        /* Gaya card */
        .card {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); /* Shadow */
            margin-bottom: 2rem;
        }

        /* Gaya judul */
        .card-title {
            font-weight: bold;
        }

        /* Gaya tombol */
        .btn {
            padding: 10px 20px; /* Padding untuk mengatur ruang di dalam tombol */
            font-size: 1.1rem; /* Ukuran font yang sedikit lebih besar */
            border-radius: 8px; /* Bentuk melengkung */
            border: none; /* Hapus border default */
            background-color: #6DA4AA; /* Warna latar belakang default */
            color: white; /* Warna teks default */
            transition:0.3s ease, color 0.3s ease; /* Transisi hover */
            cursor: pointer; /* Mengubah kursor saat hover */
            box-shadow: 3px 3px 6px rgba(0, 0, 0, 0.2); /* Efek bayangan */
        }

        /* Efek hover smooth */
        .btn:hover {
            background-color: #A1EEBD; /* Warna latar belakang saat dihover */
            color: black; /* Warna teks saat dihover */
        }
    </style>
</head>

<body style="background-color : #C7C8CC">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card" data-aos="fade-up">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Hasil Ujian</h3>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h4 class="card-title">Peserta Ujian: <?php echo $_SESSION['nama']; ?></h4>
                            </div>
                            <div class="col-12 mb-3">
                                <h5 class="card-title">Jumlah Benar</h5>
                                <p class="card-text"><?= $skor ?></p>
                            </div>
                            <div class="col-12 mb-3">
                                <h5 class="card-title">Jumlah Soal</h5>
                                <p class="card-text"><?= $jumlah_soal ?></p>
                            </div>
                            <div class="col-12 mb-3">
                                <h5 class="card-title">Nilai Peserta</h5>
                                <p class="card-text"><?= number_format($nilai_siswa, 2) ?></p>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="login/logout.php" class="btn btn-primary">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, /* Durasi animasi dalam milidetik */
            easing: 'ease-in-out' /* Efek easing */
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
