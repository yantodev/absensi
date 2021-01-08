<!-- Modal Edit-->

<form action="" method="POST">
    <div class="modal-body col-6">
        <div class="form-group">
            <select name="jurusan" id="jurusan" value="<?= $data['jurusan']; ?>">
                <option value="<?= $data['jurusan']; ?>"><?= $data['jurusan']; ?></option>
                <?php foreach ($data2 as $d) : ?>
                    <option value=" <?= $d['singkatan_jurusan']; ?>"><?= $d['jurusan']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="iduka" name="iduka" value="<?= $data['iduka']; ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>">
        </div>
        <input type="hidden" id="id" name="id" value="<?= $data['id']; ?>">
        <button type=" submit" class="btn btn-primary">Update</button>
    </div>
</form>