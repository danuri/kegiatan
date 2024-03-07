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
            <?php if($giat->praregister == 1){?>
            <div class="card">
              <div class="card-body">
                <form action="" method="post" id="add">
                  <div class="row mb-3">
                      <div class="col-lg-3">
                          <label for="contactNumber" class="form-label">Surat Tugas</label>
                      </div>
                      <div class="col-lg-9">
                        <div class="input-group">
                          <input type="file" class="form-control" aria-label="Upload">
                          <input type="hidden" name="filename" value="<?= $giat->surat_tugas?>">
                          <button class="btn btn-success" type="button" id="inputGroupFileAddon04">Upload</button>
                        </div>
                      </div>
                  </div>
              </form>
              </div>
            </div>
            <?php } ?>

            <div class="card">
              <div class="card-header">
                Edit Kegiatan
              </div>
              <div class="card-body">
                <form action="" method="post" id="add">
                  <div class="row mb-3">
                      <div class="col-lg-3">
                          <label for="nameInput" class="form-label">Jenis Kegiatan</label>
                      </div>
                      <div class="col-lg-9">
                          <select class="form-select" name="jenis">
                            <option value="Fullboard" <?= ($giat->jenis=='Fullboard')?'selected':'';?>>Fullboard</option>
                            <option value="Fullday" <?= ($giat->jenis=='Fullday')?'selected':'';?>>Fullday</option>
                            <option value="Meeting" <?= ($giat->jenis=='Meeting')?'selected':'';?>>Meeting</option>
                          </select>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-lg-3">
                          <label for="nameInput" class="form-label">Nama Kegiatan</label>
                      </div>
                      <div class="col-lg-9">
                          <input type="text" class="form-control" name="kegiatan" value="<?= $giat->kegiatan?>">
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-lg-3">
                          <label for="websiteUrl" class="form-label">Lokasi Kegiatan</label>
                      </div>
                      <div class="col-lg-9">
                          <input type="text" class="form-control" name="lokasi" value="<?= $giat->lokasi?>">
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-lg-3">
                          <label for="dateInput" class="form-label">Tahun Anggaran</label>
                      </div>
                      <div class="col-lg-9">
                          <input type="number" class="form-control" name="tahun_anggaran" value="<?= $giat->tahun_anggaran?>">
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-lg-3">
                          <label for="timeInput" class="form-label">Waktu</label>
                      </div>
                      <div class="col-lg-4">
                          <input type="date" class="form-control" name="waktu_awal" value="<?= $giat->waktu_awal?>">
                      </div>
                      <div class="col-lg-4">
                          <input type="date" class="form-control" name="waktu_akhir" value="<?= $giat->waktu_akhir?>">
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-lg-3">
                          <label for="leaveemails" class="form-label">Kota Pelaksanaan</label>
                      </div>
                      <div class="col-lg-9">
                          <input type="text" class="form-control" name="kota" value="<?= $giat->kota?>">
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-lg-3">
                          <label for="contactNumber" class="form-label">Tanggal Tanda Tanggan</label>
                      </div>
                      <div class="col-lg-9">
                          <input type="date" class="form-control" name="tanggal_sign" value="<?= $giat->tanggal_sign?>">
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-lg-3">
                          <label for="meassageInput" class="form-label">Tampilkan Rekening?</label>
                      </div>
                      <div class="col-lg-9">
                        <select class="form-select" name="rekening">
                          <option value="1" <?= ($giat->rekening==1)?'selected':'';?>>Ya</option>
                          <option value="0" <?= ($giat->rekening==0)?'selected':'';?>>Tidak</option>
                        </select>
                      </div>
                  </div>
                  <div class="text-end">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
              </form>
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
