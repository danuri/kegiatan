<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Kegiatan Perjalanan Dinas</h4>
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
                        <th width="30%">Kegiatan</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($giats as $row) {?>
                        <tr>
                          <td><?= $row->kegiatan?></td>
                          <td><?= $row->tgl_awal.' s.d '.$row->tgl_akhir?></td>
                          <td><?= isactiveperjadin($row->is_active,$row->kode)?></td>
                          <td> <a href="<?= site_url('pengelola/perjadin/detail/'.$row->kode)?>" class="btn btn-sm btn-primary">Detail</a> <a href="<?= site_url('pengelola/perjadin/edit/'.encrypt($row->kode))?>" class="btn btn-sm btn-success">Edit</a></td>
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

<div class="modal fade" id="addkegiatan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Buat Kegiatan Perjalanan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
              <form action="<?= site_url('pengelola/perjadin/save')?>" method="post" id="add" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nameInput" class="form-label">Nama Kegiatan</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="kegiatan">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="websiteUrl" class="form-label">Sasaran Kegiatan</label>
                    </div>
                    <div class="col-lg-9">
                      <textarea name="sasaran" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="timeInput" class="form-label">Waktu Kegiatan</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="date" class="form-control" name="tgl_awal">
                    </div>
                    <div class="col-lg-4">
                        <input type="date" class="form-control" name="tgl_akhir">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="meassageInput" class="form-label">Nomor Surat Tugas</label>
                    </div>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" name="nomor_st" value="">
                    </div>
                </div>
                <div class="row mb-3">
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="meassageInput" class="form-label">Tahun Anggaran</label>
                    </div>
                    <div class="col-lg-9">
                      <input type="number" class="form-control" name="tahun_anggaran" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="meassageInput" class="form-label">Lampiran Surat Tugas</label>
                    </div>
                    <div class="col-lg-9">
                      <input type="file" class="form-control" name="lampiran" value="">
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary " onclick="$('#add').submit()">Simpan</button>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript">

</script>
<?= $this->endSection() ?>
