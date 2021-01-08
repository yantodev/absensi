    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="<?= base_url('auth/registration'); ?>">
                                <div class="form-group">
                                    <select id="role_id" name="role_id" class="form-control">
                                        <option value="">Pilih Jurusan</option>
                                        <?php foreach ($jurusan as $j) : ?>
                                            <option value="<?= $j['id_jurusan']; ?>"><?= $j['jurusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <select id="tp" name="tp" class="form-control">
                                        <option value="">Pilih Tahun Pelajaran</option>
                                        <?php foreach ($tp as $t) : ?>
                                            <option value="<?= $t['tp']; ?>"><?= $t['tp']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('tp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="nis" class="form-control form-control-user" name="nis" placeholder="Nomor Induk Siswa" value="<?= set_value('nis'); ?>">
                                    <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="name" class="form-control form-control-user" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="#">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>