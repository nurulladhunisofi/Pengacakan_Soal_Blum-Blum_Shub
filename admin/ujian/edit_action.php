<?php
    $id = $_POST['id'];
    $pertanyaan = $_POST['pertanyaan'];
    $A = $_POST['A'];
    $B = $_POST['B'];
    $C = $_POST['C'];
    $D = $_POST['D'];
    $benar = $_POST['benar'];


    if ($pertanyaan != "" && $A != "" && $B != "" && $C != "" && $D != "" && $benar != "") {
        $sql = mysqli_query($db, "UPDATE soal SET pertanyaan='$pertanyaan', jawaban_A='$A', jawaban_B='$B', jawaban_C='$C', jawaban_D='$D', kunci_jawaban='$benar' WHERE id_soal='$id'");
        echo"
        <script>
            alert('Edit berhasil');
            window.location.href = '?page=ujian/tampil.php';
        </script>
        ";
    }else {
        echo"
        <script>
            alert('Edit gagal');
            window.location.href = '?page=ujian/edit.php&id=$id';
        </script>
        ";
    }
?>