<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Kegiatan yang dibuat</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"> <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addkegiatan  "><i class="icon-plus"></i> Buat Kegiatan</button> </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-body">
                <div class="">
                  <table class="table align-middle table-striped-columns mb-0 datatable">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>Kegiatan</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($giats as $row) {?>
                        <tr>
                          <td><?= $row->waktu_awal?></td>
                          <td><?= $row->kegiatan?></td>
                          <td><?= $row->kota?></td>
                          <td><?= isactive($row->is_active,$row->kode)?></td>
                          <td> <a href="<?= site_url('pengelola/kegiatan/'.encrypt($row->kode))?>" class="btn btn-sm btn-primary">Detail</a> <a href="<?= site_url('pengelola/kegiatan/edit/'.encrypt($row->kode))?>" class="btn btn-sm btn-primary">Edit</a> </td>
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

<!-- Default Modals -->
<div id="addkegiatan" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Buat Kegiatan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
              <form action="<?= site_url('pengelola/kegiatan/save')?>" method="post" id="add">
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nameInput" class="form-label">Jenis Kegiatan</label>
                    </div>
                    <div class="col-lg-9">
                        <select class="form-select" name="jenis">
                          <option value="Fullboard">Fullboard</option>
                          <option value="Fullday">Fullday</option>
                          <option value="Meeting">Meeting</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nameInput" class="form-label">Nama Kegiatan</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" id="kegiatan" name="kegiatan">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="websiteUrl" class="form-label">Lokasi Kegiatan</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" id="lokasi" name="lokasi">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="dateInput" class="form-label">Tahun Anggaran</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" id="tahun_anggaran" name="tahun_anggaran" value="<?= date('Y')?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="timeInput" class="form-label">Waktu</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="date" class="form-control" id="waktu_awal" name="waktu_awal">
                    </div>
                    <div class="col-lg-4">
                        <input type="date" class="form-control" id="waktu_akhir" name="waktu_akhir">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="leaveemails" class="form-label">Kota Pelaksanaan</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" id="kota" name="kota">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="contactNumber" class="form-label">Tanggal Tanda Tanggan</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="date" class="form-control" id="tanggal_sign" name="tanggal_sign">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="meassageInput" class="form-label">Tampilkan Rekening?</label>
                    </div>
                    <div class="col-lg-9">
                      <select class="form-select" name="rekening">
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary " onclick="$('#add').submit()">Simpan</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?= $this->endSection() ?>
