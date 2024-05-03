<?php
    include 'koneksi.php';
    session_start();
    if ($_SESSION['status'] != "login_user") {
        header('location:login/login.php');
    }

// Contoh sederhana Blum Blum Shub
function blumBlumShub($seed, $n, $length) {
    $m = $n; // Dalam implementasi nyata, m adalah hasil kali p*q dimana p dan q adalah bilangan prima.
    $x = ($seed * $seed) % $m;
    $bits = '';

    for ($i = 0; $i < $length; $i++) {
        $x = ($x * $x) % $m;
        $bits .= ($x % 2 == 0) ? '0' : '1';
    }

    return bindec($bits) % $length; // Mengubah bit menjadi desimal dan modulo dengan panjang untuk mendapatkan index
}

function customShuffle(&$array, $seed) {
    $n = count($array);
    for ($i = 0; $i < $n - 1; $i++) {
        // Menggunakan BBS untuk menghasilkan index acak
        $j = blumBlumShub($seed + $i, 293, $n - $i) + $i;
        // Tukar elemen
        $temp = $array[$i];
        $array[$i] = $array[$j];
        $array[$j] = $temp;
    }
}

// Mengecek apakah sudah ada seed yang disimpan di session

if (!isset($_SESSION['token'])) {
    // Jika belum ada seed, buat seed baru
    $_SESSION['seed'] = mt_rand(); // Menggunakan fungsi mt_rand() untuk menghasilkan seed acak
}

// Mendapatkan seed dari session
    $seed = $_SESSION['token'];
// Mengambil data soal dari database
$sql = mysqli_query($db, "SELECT * FROM soal");
$ujian = [];
while ($ambil_data = mysqli_fetch_assoc($sql)) {
    $ujian[] = $ambil_data;
}

// Melakukan pengacakan soal
customShuffle($ujian, $seed);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian Blum Blum Shub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
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
        /* Efek hover pada card */
        .card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); /* Shadow saat card dihover */
        }

        /* Radius dan shadow card */
        .card {
            border-radius: 10px; /* Radius card */
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); /* Shadow card */
            background-color: #f8f9fa; /* Latar belakang card */
            margin-bottom: 15px; /* Margin bawah untuk jarak antar card */
        }

        /* Gaya timer */
        #timer {
            font-weight: bold;
            font-size: 1.5rem;
            text-align: center;
            display: none;
        }
        .navbar-brand img {
         height: 40px; /* Atur tinggi gambar sesuai kebutuhan */
         width: auto; /* Agar gambar tidak terdistorsi */
        }

        nav.navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow lembut */
        }
    </style>
</head>

<body style="background-color : #C7C8CC">
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color : #B3C8CF" >
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="icon.png" alt="Deskripsi gambar" /></a>
            <a class="navbar-brand" href="#">Ujian Online |</a>
            <a class="navbar-brand" href="#">Peserta Ujian: <?php echo $_SESSION['nama']; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    <li>Sisa Waktu Ujian:<div id="timer">00:10:00</div></li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal syarat ujian -->
   <!-- Modal syarat ujian -->
<div class="modal fade" id="syaratUjianModal" tabindex="-1" aria-labelledby="syaratUjianModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="syaratUjianModalLabel">Syarat Ujian</h5>
            </div>
            <div class="modal-body">
                <!-- Syarat ujian -->
                <p>1. Pastikan Anda mengisi semua pertanyaan dengan benar.</p>
                <p>2. Baca setiap pertanyaan dengan cermat sebelum menjawab.</p>
                <p>3. Anda hanya dapat menyelesaikan ujian satu kali.</p>
                <p>4. Waktu ujian terbatas, pastikan untuk mengelola waktu Anda dengan baik.</p>
                <p>5. Jangan Lupa Berdoa, sebelum Memulai Ujian.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="okButton" data-bs-dismiss="modal">Baik dan Lanjutkan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal waktu habis -->
<div class="modal fade" id="waktuHabisModal" tabindex="-1" aria-labelledby="waktuHabisModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="waktuHabisModalLabel">Waktu Habis</h5>
            </div>
            <div class="modal-body">
                Waktu ujian Anda telah habis.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="waktuHabisOkButton">Selesai</button>
            </div>
        </div>
    </div>
</div>


    <div class="container mt-4">
        <div id="soalUjian" style="display: none;">
            <!-- Timer -->
            <!-- Form untuk ujian -->
            <form id="ujianForm" action="action.php" method="post">
                <?php
                $no = 1;
                foreach ($ujian as $key => $value) {
                    $id_soal = $value['id_soal'];
                    $pertanyaan = $value['pertanyaan'];
                    $jawaban_a = $value['jawaban_a'];
                    $jawaban_b = $value['jawaban_b'];
                    $jawaban_c = $value['jawaban_c'];
                    $jawaban_d = $value['jawaban_d'];
                ?>
                    <!-- Card untuk setiap soal -->
                    <div class="card" data-aos="fade-right">
                        <div class="card-body">
                            <h5 class="card-title"><?=$no++?>. <?=$pertanyaan?></h5>
                            <!-- Opsi jawaban -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jawaban[<?=$id_soal?>]" id="jawaban_a<?=$id_soal?>" value="A">
                                <label class="form-check-label" for="jawaban_a<?=$id_soal?>">
                                    <?=$jawaban_a?>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jawaban[<?=$id_soal?>]" id="jawaban_b<?=$id_soal?>" value="B">
                                <label class="form-check-label" for="jawaban_b<?=$id_soal?>">
                                    <?=$jawaban_b?>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jawaban[<?=$id_soal?>]" id="jawaban_c<?=$id_soal?>" value="C">
                                <label class="form-check-label" for="jawaban_c<?=$id_soal?>">
                                    <?=$jawaban_c?>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jawaban[<?=$id_soal?>]" id="jawaban_d<?=$id_soal?>" value="D">
                                <label class="form-check-label" for="jawaban_d<?=$id_soal?>">
                                    <?=$jawaban_d?>
                                </label>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- Tombol "Selesai Ujian" -->
                <button type="submit" class="btn btn-primary" id="selesaiUjianBtn">Selesai Ujian</button>

                <!-- Modal -->
                <div class="modal fade" id="konfirmasiModal" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Anda yakin ingin menyelesaikan ujian? Mohon di cek lagi waktu masih ada kok.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" id="konfirmasiBtn">Selesai Ujian</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, /* Durasi animasi dalam milidetik */
            easing: 'ease-in-out' /* Efek easing */
        });

        // Menampilkan modal syarat ujian saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            var modal = new bootstrap.Modal(document.getElementById('syaratUjianModal'));
            modal.show();
        });

        // Menampilkan soal ujian setelah tombol Ok pada modal di klik
        document.getElementById('okButton').addEventListener('click', function() {
            document.getElementById('soalUjian').style.display = 'block';
            document.getElementById('timer').style.display = 'block'; // Menampilkan timer
            startTimer(); // Memulai timer
        });

        // Fungsi startTimer() untuk memulai timer ujian
        function startTimer() {
            let timeLeft = 600; // 1 menit dalam detik
            const timerElement = document.getElementById('timer');

            const timerInterval = setInterval(function() {
                if (timeLeft > 0) {
                    timeLeft--;
                    const minutes = Math.floor(timeLeft / 60);
                    const seconds = timeLeft % 60;
                    timerElement.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                } else {
                    clearInterval(timerInterval);
                    showTimeUpModal(); // Tampilkan modal waktu habis
                }
            }, 1000);
        }

        // Fungsi untuk menampilkan modal waktu habis
        function showTimeUpModal() {
            const timeUpModal = new bootstrap.Modal(document.getElementById('waktuHabisModal'));
            timeUpModal.show();

            document.getElementById('waktuHabisOkButton').addEventListener('click', function() {
                document.getElementById('ujianForm').submit(); // Kirim form secara otomatis
            });
        }

                // Tambahkan event listener ke tombol "Selesai Ujian"
        document.getElementById("selesaiUjianBtn").addEventListener("click", function(event) {
            // Mencegah form dari pengiriman otomatis
            event.preventDefault();
            
            // Menampilkan modal
            var konfirmasiModal = new bootstrap.Modal(document.getElementById("konfirmasiModal"));
            konfirmasiModal.show();
        });

        // Tambahkan event listener ke tombol "Selesai Ujian" di modal
        document.getElementById("konfirmasiBtn").addEventListener("click", function() {
            // Tindakan yang ingin Anda lakukan saat pengguna mengkonfirmasi ujian selesai
            // Misalnya, kirim form atau arahkan ke halaman lain
            
            // Contoh: Kirim form (pastikan ini adalah form yang ingin Anda kirim)
            document.querySelector("form").submit();
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
