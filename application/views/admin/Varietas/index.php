      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Halaman Varietas</h3>
            </div>

          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Daftar Varietas</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="row mt-3">
                    <div class="col-md-6">
                      <a href="" class="btn btn-primary" data-toggle="modal" data-target="#tambahVarietas">Tambah Data Varietas</a>
                    </div>
                  </div>

                  <?= $this->session->flashdata('pesan'); ?>
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10%">No</th>
                        <th style="width: 5%">Kode Varietas</th>
                        <th style="width: 15%">Nama Varietas</th>
                        <th style="width: 10%">Gambar</th>
                        <th style="width: 50%">Cara Perawatan</th>
                        <th>Kelola</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($tbl_varietas as $vrs) : ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $vrs['kode_varietas']; ?></td>
                          <td><?= $vrs['nama_varietas']; ?></td>
                          <td><img src="<?= base_url('assets/images/varietas/') . $vrs['gambar']; ?>" width="150"></td>
                          <td><?= $vrs['cara_perawatan']; ?></td>
                          <td>
                            <a href="<?= base_url('varietas/hapus/') . $vrs['id_varietas']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Data akan dihapus');">Hapus</a>
                            <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target=".ubahVarietas<?= $vrs['id_varietas']; ?>">Ubah</a>
                          </td>
                        </tr>
                        <?php $i++; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
      <!-- /page content -->