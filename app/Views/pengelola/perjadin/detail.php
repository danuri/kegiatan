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
                            <li class="breadcrumb-item"> Detail </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-body">
                <table class="table">
                  <tr>
                    <td>Kegiatan</td>
                    <td><?= $giat->kegiatan?></td>
                  </tr>
                  <tr>
                    <td>Waktu Perjalanan</td>
                    <td><?= $giat->tgl_awal?> s.d <?= $giat->tgl_akhir?></td>
                  </tr>
                  <tr>
                    <td>Nomor Surat Tugas</td>
                    <td><?= $giat->nomor_surat?></td>
                  </tr>
                  <tr>
                    <td>Lampiran Surat Tugas</td>
                    <td><a href="https://ropeg.kemenag.go.id:9000/presensi/ketidakhadiran/<?= $giat->surat_tugas?>" target="_blank"><?= $giat->surat_tugas?></a></td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="card">
              <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Peserta Kegiatan</h4>
                <div class="flex-shrink-0">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addpeserta"><i class="icon-plus"></i> Tambah Peserta</button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered datatable">
                  <thead>
                    <tr>
                      <th>Peserta</th>
                      <th>Tujuan</th>
                      <th>Waktu Perjalanan</th>
                      <th>Status</th>
                      <th>Laporan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($peserta as $row) {?>
                      <tr>
                        <td>
                          <div class="d-flex bd-highlight">
                            <div class="p-2 w-100 bd-highlight">
                              <b><?= $row->nama?></b><br><?= $row->nip?><br><?= $row->jabatan?><br><?= $row->pangkat?>
                            </div>
                            <div class="p-2 flex-shrink-1 bd-highlight"><a href="<?= site_url('pengelola/perjadin/deletepeserta/'.encrypt($row->id))?>" class="btn btn-sm btn-danger" onclick="return confirm('Data akan dihapus?')"><i class="ri-delete-bin-line"></i></a> <a href="#" class="btn btn-sm btn-primary"><i class="ri-pencil-line"></i></a></div>
                          </div>
                        </td>
                        <td><?= $row->satker?></td>
                        <td><?= $row->tanggal_mulai?> s.d <?= $row->tanggal_akhir?></td>
                        <td><?= $row->status?></td>
                        <td></td>
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

<div class="modal fade" id="addpeserta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Peserta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
              <form action="<?= site_url('pengelola/perjadin/peserta/save')?>" method="post" id="add">
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nip" class="form-label">NIP</label>
                    </div>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <input type="text" class="form-control" name="nip" id="nip" aria-label="NIP" aria-describedby="cari">
                        <button class="btn btn-outline-success" type="button" id="cari" onclick="getPegawai()">Cari</button>
                      </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nama" class="form-label">Nama</label>
                    </div>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" name="nama" id="nama" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                    </div>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" name="jabatan" id="jabatan" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="pangkat" class="form-label">Pangkat/Golongan</label>
                    </div>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" name="pangkat" id="pangkat" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="timeInput" class="form-label">Waktu Perjalanan</label>
                    </div>
                    <div class="col-lg-4">
                        <input type="date" class="form-control" name="tgl_awal" value="<?= $giat->tgl_awal?>">
                    </div>
                    <div class="col-lg-4">
                        <input type="date" class="form-control" name="tgl_akhir" value="<?= $giat->tgl_akhir?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="meassageInput" class="form-label">Tujuan</label>
                    </div>
                    <div class="col-lg-9">
                      <select class="form-select" name="tujuan">
                        <option value="">Pilih Tujuan</option>
                        <?php foreach ($tujuan as $row) {
                          echo '<option value="'.$row->id.'">'.$row->satker.'</option>';
                        } ?>
                      </select>
                    </div>
                </div>
                <input type="hidden" name="kode" value="<?= $giat->kode?>">
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
<script src="https://cdn.jsdelivr.net/npm/axios@1.6.7/dist/axios.min.js"></script>
<script type="text/javascript">
function getPegawai() {
  let nip = $('#nip').val();

  axios.get('<?= site_url()?>ajax/getpegawai/'+nip)
  .then(function (response) {
    console.log(response.data);
    $('#nama').val(response.data.NAMA_LENGKAP);
    $('#jabatan').val(response.data.TAMPIL_JABATAN);
    $('#pangkat').val(response.data.PANGKAT+' '+response.data.GOL_RUANG);
  });
}
</script>
<?= $this->endSection() ?>
