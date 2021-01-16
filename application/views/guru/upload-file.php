<?= form_open_multipart('guru/file_kegiatan'); ?>
<div class="form-group">
    <div class="col-lg-2">Judul File</div>
    <div class="col-lg-6">
        <div class="custom-file">
            <input type="text" name="judul" id="judul" class="form-control col-lg-6" placeholder="Judul File">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-lg-2">Photo</div>
    <div class="col-lg-6">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="file" name="file">
            <label class="custom-file-label">Choose file</label>
            <small>ukuran file tidak boleh lebih dari 10Mb (format file jpeg|jpg|png|jpeg|pdf|doc|docx)</small>
            <?= form_error('file', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
    </div>
</div>
<input type="hidden" name="id" id="id" value="<?= $data['id']; ?>">
<input type="hidden" name="owner" id="owner" value="<?= $data['owner']; ?>">
<button type="submit" class="btn btn-facebook">UPLOAD</button>
</form>