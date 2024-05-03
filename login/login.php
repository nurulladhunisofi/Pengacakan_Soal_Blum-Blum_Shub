<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>

        body {
            background-color: #D6DAC8;
            font-family: 'Roboto', sans-serif;
        }

        /* Gaya umum untuk card */
        .card {
            border-radius: 15px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow pada card */
        }

        /* Gaya tombol */
        .btn {
            margin-top: 1rem;
            width: 100%; /* Memperpanjang tombol */
            border-radius: 8px; /* Membuat sudut tombol melengkung */
            transition: all 0.3s ease-in-out; /* Menambahkan transisi halus */
            background-color: #527853;
            color: #ffff;
        }

        /* Efek hover pada tombol */
        .btn:hover {
            color: black;
            background-color: #D9EDBF; /* Biru pastel */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); /* Bayangan pada tombol */
        }

        /* Gaya input */
        .form-control {
            border-radius: 8px;
        }

        /* Gaya font */
        body, input, button {
            font-family: 'Roboto', sans-serif;
        }

        /* Gaya gambar */
        .image-container img {
            max-width: 100%;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow pada gambar */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row align-items-center justify-content-center" style="min-height: 100vh;">
            <!-- Kolom untuk gambar -->
            <div class="col-md-6 d-none d-md-flex justify-content-center image-container" data-aos="fade-right">
                <img src="login.gif" alt="Deskripsi gambar" class="img-fluid" />
            </div>

            <!-- Kolom untuk form login -->
            <div class="col-md-6 col-lg-5">
                <div class="card shadow p-4" data-aos="flip-left">
                    <h1 class="text-center mb-4"><b>Silahkan Login</b></h1>
                    <form action="login_action.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input name="username" type="text" class="form-control" id="username" placeholder="Masukkan username Anda" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Masukkan password Anda" required>
                        </div>
                        <button type="submit" class="btn">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init(); // Menginisialisasi AOS
    </script>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
