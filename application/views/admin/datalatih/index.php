      <!-- page content -->
      <div class="right_col" role="main">
          <div class="">
              <div class="page-title">
                  <div class="title_left">
                      <h3>Halaman Data Latih</h3>
                  </div>
              </div>
              <div class="clearfix"></div>

              <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                          <div class="x_content">
                              <div class="row mt-3">
                                  <div class="col-md-3">
                                      <a href="" class="btn btn-round btn-primary mb-3" data-toggle="modal"
                                          data-target=".tambah">Tambah Data Karakteristik</a>
                                  </div>
                                  <div class="col-md-2">
                                      <form action="<?= base_url('DataLatih/import_excel'); ?>" method="post"
                                          enctype="multipart/form-data">
                                          <div class="form-group">
                                              <label>Pilih File Excel</label>
                                              <input type="file" name="fileExcel">
                                          </div>
                                          <div>
                                              <button class='btn btn-success' type="submit">
                                                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                  Import
                                              </button>
                                          </div>
                                      </form>
                                  </div>
                                  <div class="col-md-2">
                                      <!-- <?php 
                                    $a = '';
                                    $b = '';
                                    ?> -->
                                      <a href="<?= base_url('DataLatih/pembentukan_tree') ?>"
                                          class="btn btn-warning btn-sm">Proses Mining</a>
                                  </div>
                              </div>
                              <?php if(!empty($this->session->flashdata('status'))){ ?>
                              <div class="alert alert-info" role="alert">
                                  <?= $this->session->flashdata('status'); ?></div>
                              <?php } ?>
                              <?= $this->session->flashdata('pesan'); ?>
                              <table id="datatable" class="table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                          <th style="text-align: center">No</th>
                                          <th style="text-align: center">Nama Anggrek</th>
                                          <th style="text-align: center">Genus</th>
                                          <th style="text-align: center">Akar</th>
                                          <th style="text-align: center">Batang</th>
                                          <th style="text-align: center">Bentuk Daun</th>
                                          <th style="text-align: center">Jumlah Mahkota</th>
                                          <th style="text-align: center">Bentuk Mahkota</th>
                                          <th style="text-align: center">Lidah</th>
                                          <th style="text-align: center">Motif</th>
                                          <th style="text-align: center">Taksonomi</th>
                                          <th style="text-align: center">Kelola</th>
                                      </tr>
                                  </thead>

                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($datalatih as $dl) : ?>
                                      <tr>
                                          <td style="text-align: center"><?= $i; ?></td>
                                          <td style="text-align: center"><?= $dl->nama_anggrek; ?></td>
                                          <td style="text-align: center"><?= $dl->genus; ?></td>
                                          <td style="text-align: center"><?= $dl->akar; ?></td>
                                          <td style="text-align: center"><?= $dl->batang; ?></td>
                                          <td style="text-align: center"><?= $dl->bentuk_daun; ?></td>
                                          <td style="text-align: center"><?= $dl->jumlah_mahkota; ?></td>
                                          <td style="text-align: center"><?= $dl->bentuk_mahkota; ?></td>
                                          <td style="text-align: center"><?= $dl->lidah; ?></td>
                                          <td style="text-align: center"><?= $dl->motif; ?></td>
                                          <td style="text-align: center"><?= $dl->taksonomi_asli; ?></td>
                                          <td style="text-align: center;">
                                              <a href="<?= base_url('DataLatih/hapus/') . $dl->id; ?>"
                                                  class="btn btn-danger btn-sm"
                                                  onclick="return confirm('Data akan dihapus');">Hapus</a>
                                              <a href="" class="btn btn-warning btn-sm" data-toggle="modal"
                                                  data-target=".ubahDatalatih<?= $dl->id; ?>">Ubah</a>
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