<?= form_open_multipart('admin/upload_foto_kegiatan'); ?>
<div class="form-group">
    <div class="col-lg-2">Photo</div>
    <div class="col-lg-6">
        <div class="custom-file pb-3">
            <input type="file" class="custom-file-input" multiple="" name="foto[]">
            <label class="custom-file-label">Choose file</label>
            <small>ukuran file tidak boleh lebih dari 10Mb (format file jpeg|jpg|png|jpeg|pdf|doc|docx)</small>
            <?= form_error('file', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
    </div>
</div>
<!-- <input type="hidden" name="kegiatan" id="kegiatan" value="<?= $data['kegiatan']; ?>"> -->
<input type="hidden" name="id[]" id="id" value="<?= $data['id']; ?>">
<input type="hidden" name="owner" id="owner" value="<?= $data['owner']; ?>">
<!-- <input type='submit' value='Upload' name='upload' /> -->
<button type="submit" class="btn btn-facebook">UPLOAD</button>
</form>