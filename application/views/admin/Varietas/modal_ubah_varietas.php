<!-- Modal Edit -->
<?php foreach ($tbl_varietas as $vrs) : ?>
<div class="modal fade ubahVarietas<?= $vrs['id_varietas']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="forModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="apasih">Ubah Varietas</h5>
            </div>

            <?= form_open_multipart('varietas/ubahVarietas'); ?>
            <input type="hidden" name="id" value="<?= $vrs['id_varietas']; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="kode_varietas">Kode Varietas</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="<?= $vrs['kode_varietas']; ?>"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="nama_varietas">Nama Varietas</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $vrs['nama_varietas']; ?>">
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Anggrek</label>
                    <img style="margin-bottom: 10px; width: 100px;"
                        src=" <?= base_url('assets/images/varietas/') . $vrs['gambar']; ?>">
                    <input type="file" class="form-control" id="gambar" name="gambar"
                        value="<?= $vrs['gambar']; ?>"><?= $vrs['gambar']; ?>"
                </div>
                <div class="form-group">
                    <label for="cara_perawatan">Cara Perawatan</label>
                    <input type="cara_perawatan" class="form-control" name="cara_perawatan"
                        value="<?= $vrs['cara_perawatan']; ?>">
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