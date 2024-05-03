<?php
    $id = $_GET['id'];
    $sql = mysqli_query($db, "SELECT * FROM soal WHERE id_soal = $id");
    $ambil_data = mysqli_fetch_assoc($sql);
    $id_soal = $ambil_data['id_soal'];
    $pertanyaan = $ambil_data['pertanyaan'];
    $jawaban_a = $ambil_data['jawaban_a'];
    $jawaban_b = $ambil_data['jawaban_b'];
    $jawaban_c = $ambil_data['jawaban_c'];
    $jawaban_d = $ambil_data['jawaban_d'];
    $kunci_jawaban = $ambil_data['kunci_jawaban'];
?>
<div class="col-md-12">
    <h1>Edit Pertanyaan</h1>
    <form action="?page=ujian/edit_action.php" method="POST">
        <div class="mb-3">
            <input value="<?=$id_soal?>" name="id" type="hidden">
            <label for="exampleInputEmail1" class="form-label">Pertanyaan</label>
            <input value="<?=$pertanyaan?>" name="pertanyaan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pilihan A</label>
            <input value="<?=$jawaban_a?>" name="A" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pilihan B</label>
            <input value="<?=$jawaban_b?>" name="B" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pilihan C</label>
            <input value="<?=$jawaban_c?>" name="C" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pilihan D</label>
            <input value="<?=$jawaban_d?>" name="D" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pilihan Benar</label>
            <select class="form-control" id="exampleInputEmail1" name="benar" id="">
                <option <?php if ($kunci_jawaban == "A") {echo "selected";}?> value="A">A</option>
                <option <?php if ($kunci_jawaban == "B") {echo "selected";}?> value="B">B</option>
                <option <?php if ($kunci_jawaban == "C") {echo "selected";}?> value="C">C</option>
                <option <?php if ($kunci_jawaban == "D") {echo "selected";}?> value="D">D</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>