<?= form_open_multipart('guru/upload_jurnal'); ?>
<div class="form-group">
    <div class="col-lg-2">Photo</div>
    <div class="col-lg-6">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="foto" name="foto">
            <label class="custom-file-label">Choose file</label>
            <small>ukuran file tidak boleh lebih dari 10Mb (format file gif|jpg|png|jpeg)</small>
            <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
    </div>
</div>
<input type="hidden" name="id" id="id" value="<?= $data['id']; ?>">
<input type="hidden" name="nbm" id="nbm" value="<?= $data['nbm']; ?>">
<button type="submit" class="btn btn-facebook">UPLOAD</button>
</form>