<!-- Modal Tambah -->
<div class="modal fade" id="tambahVarietas" tabindex="-1" role="dialog" aria-labelledby="forModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="apasih">Tambah Varietas</h5>
      </div>
      <?= form_open_multipart('varietas/tambah'); ?>
      <div class="modal-body">
        <input type="hidden" name="id" id="id">

        <div class="form-group">
          <label for="nama">Kode Varietas</label>
          <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode varietas" value="<?= $kode; ?>" readonly>
        </div>

        <div class="form-group">
          <label for="nama">Nama Varietas</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Varietas">
        </div>

        <div class="form-group">
          <label for="gambar">Masukkan Gambar Anggrek</label>
          <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar Anggrek">
        </div>

        <div class="form-group">
          <label for="cara_perawatan">Cara Perawatan</label>
          <input type="cara_perawatan" class="form-control" name="cara_perawatan" placeholder="Cara Perawatan">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-round btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>