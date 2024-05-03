<div class="col-md-12">
    <h1>Tambah Pertanyaan</h1>
    <form action="?page=ujian/tambah_data_action.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pertanyaan</label>
            <input name="pertanyaan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pilihan A</label>
            <input name="A" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pilihan B</label>
            <input name="B" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pilihan C</label>
            <input name="C" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pilihan D</label>
            <input name="D" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pilihan Benar</label>
            <select class="form-control" id="exampleInputEmail1" name="benar" id="">
                <option value="">----</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>