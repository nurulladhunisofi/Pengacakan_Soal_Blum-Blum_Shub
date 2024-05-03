<?php
    $pertanyaan = $_POST['pertanyaan'];
    $A = $_POST['A'];
    $B = $_POST['B'];
    $C = $_POST['C'];
    $D = $_POST['D'];
    $benar = $_POST['benar'];

    if ($pertanyaan != "" && $A != "" && $B != "" && $C != "" && $D != "" && $benar != "") {
        $sql = mysqli_query($db, "INSERT INTO soal (pertanyaan, jawaban_a, jawaban_b, jawaban_c, jawaban_d, kunci_jawaban) VALUES ('$pertanyaan', '$A', '$B', '$C', '$D', '$benar')");
        echo"
        <script>
            alert('Insert berhasil');
            window.location.href = '?page=ujian/tampil.php';
        </script>
        ";
    }else {
        echo"
        <script>
            alert('Insert gagal');
            window.location.href = '?page=ujian/tambah_data.php';
        </script>
        ";
    }
?>