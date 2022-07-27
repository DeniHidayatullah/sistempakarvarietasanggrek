<?php foreach ($karakteristik as $krk) : ?>
  <div class="modal fade ubahKarakteristik<?= $krk['id_karakteristik']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Ubah Data Karakteristik</h4>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('karakteristik/ubah'); ?>" method="post">
            <input type="hidden" name="id" value="<?= $krk['id_karakteristik']; ?>">
            <div class="form-group">
              <label for="kode">Kode Karakteristik</label>
              <input type="text" class="form-control" id="kode" name="kode" value="<?= $krk['kode_karakteristik']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="nama">Nama Karakteristik</label>
              <textarea id="nama" class="form-control" name="nama"><?= $krk['nama_karakteristik']; ?></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

        </form>
      </div>
    </div>
  </div>

<?php endforeach; ?>