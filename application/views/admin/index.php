     Selamat datang <?= $user['name']; ?>
     <p>Daftar Rekap Bulan ini ( <?= date('F'); ?>)</p>
     <?= $this->session->flashdata('message'); ?>
     <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                    <tr>
                         <th>#</th>
                         <th>NBM</th>
                         <th>Name</th>
                         <th>MASUK</th>
                         <th>TTD</th>
                         <th>PULANG</th>
                         <th>TTD</th>
                         <th>Action</th>
                    </tr>
               </thead>
               <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                         <tr>
                              <td><?= $i; ?></td>
                              <td><?= $d['nbm']; ?></td>
                              <td><?= $d['nama']; ?></td>
                              <td><?= $d['time_in']; ?></td>
                              <td><img src="<?= base_url() . $d['ttd_in']; ?>" width="50px" height="50px"></td>
                              <td><?= $d['time_out']; ?></td>
                              <td><img src="<?= base_url() . $d['ttd_out']; ?>" width="50px" height="50px"></td>
                              <td>
                                   <a href="<?= base_url('admin/edit_hr/') . $d['id']; ?>"><i class="fa fa-edit fa-fw" alt="detail" title="Edit"></i></a>
                                   <a href="<?= base_url(); ?>admin/hapus/<?= $d['id']; ?>"><i class="fa fa-trash fa-fw" alt="verifikasi" title="Hapus" onclick="return confirm('Yakin ingin menghapus?');"></i></a>
                              </td>
                         </tr>
                         <?php $i++; ?>
                    <?php endforeach; ?>
               </tbody>
          </table>
     </div>