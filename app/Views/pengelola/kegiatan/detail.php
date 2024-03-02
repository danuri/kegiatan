<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Kegiatan <?= $giat->kegiatan?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"> <a href="<?= site_url('pengelola/kegiatan')?>" class="btn btn-sm btn-primary text-light"><i class="icon-plus"></i> Kembali</a> </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-header">
                <div class="input-group">
                    <input type="text" class="form-control" id="biodatalink" value="<?= site_url('biodata/'.$giat->kode)?>" readonly>
                    <button class="btn btn-outline-success" type="button" onclick="copyLink()">Copy Link</button>
                    <a href="<?= site_url('biodata/'.$giat->kode)?>" class="btn btn-outline-primary" target="_blank">Kunjungi Halaman</a>
                </div>
                <div class="btn-group mt-2" role="group" aria-label="Basic example">
                  <a href="<?= site_url('pengelola/kegiatan/export/'.$giat->kode)?>" class="btn btn-success">Download Excel</a>
                  <button type="button" class="btn btn-primary">Download Nominatif</button>
                  <button type="button" class="btn btn-warning">Download Absen</button>
                  <a href="<?= site_url('pengelola/kegiatan/exportpdf/'.$giat->kode)?>" class="btn btn-danger">Download Biodata PDF</a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table align-middle table-striped-columns mb-0 datatable">
                    <thead>
                      <tr>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <th>INSTANSI</th>
                        <th>SIGN AT</th>
                        <th>AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($peserta as $row) {?>
                        <tr>
                          <td><?= $row->nip?></td>
                          <td><?= $row->nama?></td>
                          <td><?= $row->instansi?></td>
                          <td><?= $row->created_at?></td>
                          <td> <a href="<?= site_url('pengelola/kegiatan/peserta/'.encrypt($row->id))?>" class="btn btn-sm btn-primary">Detail</a> <a href="<?= site_url('pengelola/kegiatan/topdf/'.encrypt($row->id))?>" class="btn btn-sm btn-warning">PDF</a> <a href="<?= site_url('pengelola/kegiatan/delete/'.encrypt($row->id))?>" onclick="return confirm('Peserta akan dihapus?')" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script type="text/javascript">
function copyLink() {
  var copyText = document.getElementById("biodatalink");

  copyText.select();
  copyText.setSelectionRange(0, 99999);

  navigator.clipboard.writeText(copyText.value);

  alert("Copied the text: " + copyText.value);
}
</script>
<?= $this->endSection() ?>
