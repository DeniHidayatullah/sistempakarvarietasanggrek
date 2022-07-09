<!-- Modal Edit -->
<?php foreach ($pengetahuan as $P) : ?>
  <div class="modal fade ubahPengetahuan<?= $P['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="forModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" id="apasih">Ubah Pengetahuan</h5>
        </div>

        <?= form_open_multipart('pengetahuan/ubah'); ?>
        <input type="hidden" name="id" value="<?= $P['id']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label for="varietas">Pilih Varietas</label>
            <select name="varietas" id="varietas" class="form-control">
              <option value="<?= $P['kode_varietas']; ?>" selected><?= $P['kode_varietas']; ?> - <?= $P['nama_varietas']; ?></option>
              <?php foreach ($kerusakan as $k) : ?>
                <option value="<?= $V['id_varietas']; ?>"><?= $V['kode_varietas']; ?>-<?= $V['nama_varietas']; ?></option>
              <?php endforeach; ?>
            </select>
            <label for="karakteristik">Pilih Karakteristik</label>
            <select name="karakteristik" id="karakteristik" class="form-control">
              <option value="<?= $P['kode_karakteristik']; ?>"><?= $P['kode_karakteristik']; ?>-<?= $P['nama_karakteristik']; ?></option>
              <?php foreach ($karakteristik as $k) : ?>
                <option value="<?= $k['id_karakteristik']; ?>"><?= $k['kode_karakteristik']; ?> - <?= $k['nama_karakteristik']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-round btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>