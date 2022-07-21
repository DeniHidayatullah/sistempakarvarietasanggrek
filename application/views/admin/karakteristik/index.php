      <!-- page content -->
      <div class="right_col" role="main">
          <div class="">
              <div class="page-title">
                  <div class="title_left">
                      <h3>Halaman Karakteristik</h3>
                  </div>

              </div>

              <div class="clearfix"></div>

              <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                          <div class="x_title">
                              <h2><?= $tabel; ?></h2>
                              <div class="clearfWx"></div>
                          </div>
                          <div class="x_content">
                              <div class="row mt-3">
                                  <div class="col-md-6">
                                      <a href="" class="btn btn-round btn-primary mb-3" data-toggle="modal"
                                          data-target=".tambah">Tambah Data Karakteristik</a>
                                  </div>
                              </div>
                              <?= $this->session->flashdata('pesan'); ?>
                              <table id="datatable" class="table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                          <th style="width: 3px; text-align: center;">No</th>
                                          <th style="width: 40px; text-align: center;">Kode Karakteristik</th>
                                          <th style="text-align: center;">Nama Karakteristik</th>
                                          <th style="width: 100px; text-align: center;">Kelola</th>
                                      </tr>
                                  </thead>

                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($karakteristik as $krk) : ?>
                                      <tr>
                                          <td style="text-align: center"><?= $i; ?></td>
                                          <td style="text-align: center"><?= $krk['kode_karakteristik']; ?></td>
                                          <td style="text-align: center"><?= $krk['nama_karakteristik']; ?></td>
                                          <td style="text-align: center;">
                                              <a href="<?= base_url('karakteristik/hapus/') . $krk['id_karakteristik']; ?>"
                                                  class="btn btn-danger btn-sm"
                                                  onclick="return confirm('Data akan dihapus');">Hapus</a>
                                              <a href="" class="btn btn-warning btn-sm" data-toggle="modal"
                                                  data-target=".ubahKarakteristik<?= $krk['id_karakteristik']; ?>">Ubah</a>
                                          </td>
                                      </tr>
                                      <?php $i++; ?>
                                      <?php endforeach ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>


          </div>
      </div>
      <!-- /page content -->