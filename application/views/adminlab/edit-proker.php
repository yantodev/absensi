<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div>
                <!-- jquery validation -->
                <!-- /.card-header -->
                <!-- form start -->
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="">
                    <input type="hidden" name="id" class="form-control" id="id" value="<?= $proker['id']; ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Kegiatan</label>
                            <textarea id="kegiatan" name="kegiatan"><?= $proker['kegiatan']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Target</label>
                            <textarea id="target" name="target"><?= $proker['target']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Waktu</label>
                            <textarea id="waktu" name="waktu"><?= $proker['waktu']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" id="status">
                                <?php foreach ($status as $d) : ?>
                                    <?php if ($d == $proker['status']) : ?>
                                        <option value="<?= $d; ?>" selected><?= $d; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $d; ?>"><?= $d; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
</div>