<!-- Modal Tambah -->
<div class="modal fade" id="tambahPengetahuan" tabindex="-1" role="dialog" aria-labelledby="forModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="apasih">Tambah Varietas</h5>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('pengetahuan/tambah'); ?>" method="post">
          <div class="form-group">
            <input type="hidden" class="form-control" id="kode" name="kode">
          </div>
          <div class="form-group">
            <select name="varietas" id="varietas" class="form-control">
              <option value="">Pilih Varietas</option>
              <?php foreach ($varietas as $V) : ?>
              <option value="<?= $V['id_varietas']; ?>"><?= $V['kode_varietas']; ?> - <?= $V['nama_varietas']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <div class="form-group">
              <select name="karakteristik" id="karakteristik" class="form-control">
                <option value="">Pilih Karakteristik</option>
                <?php foreach ($karakteristik as $K) : ?>
                  <option value="<?= $K['id_karakteristik']; ?>"><?= $K['kode_karakteristik']; ?> - <?= $K['nama_karakteristik']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>