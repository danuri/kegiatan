<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Kegiatan <?= $kegiatan->kegiatan?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"> <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addkegiatan  "><i class="icon-plus"></i> Kembali</button> </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

  <div class="row">
    <div class="col-12 col-lg-12  mt-3">
      <div class="card">
        <div class="card-body">
          <div class="text-center">
            <h3>BIODATA PESERTA</h3>
            <h5><?= $kegiatan->kegiatan;?></h5>
            <h4><?= $kegiatan->lokasi;?></h4>
            <h6><?= $kegiatan->kota.', '.$kegiatan->waktu_awal;?></h6>
          </div>

          <table class="table">
            <tr>
              <td>NIP</td>
              <td><?= $peserta->nip;?></td>
            </tr>
            <tr>
              <td>NAMA</td>
              <td><?= $peserta->nama;?></td>
            </tr>
            <tr>
              <td>JABATAN</td>
              <td><?= $peserta->jabatan;?></td>
            </tr>
            <tr>
              <td>PANGKAT, GOLONGAN/RUANG</td>
              <td><?= $peserta->pangkat.', '.$peserta->golongan;?></td>
            </tr>
            <tr>
              <td>UNIT KERJA / INSTANSI</td>
              <td><?= $peserta->instansi;?></td>
            </tr>
            <tr>
              <td>ALAMAT KANTOR</td>
              <td><?= $peserta->alamatkantor;?></td>
            </tr>
            <tr>
              <td>ALAMAT RUMAH</td>
              <td><?= $peserta->alamatrumah;?></td>
            </tr>
            <tr>
              <td>EMAIL</td>
              <td><?= $peserta->email;?></td>
            </tr>
            <tr>
              <td>NO. HP</td>
              <td><?= $peserta->nohp;?></td>
            </tr>
            <tr>
              <td>BANK</td>
              <td><?= $peserta->bank;?></td>
            </tr>
            <tr>
              <td>NOMOR REKENING</td>
              <td><?= $peserta->norek;?></td>
            </tr>
            <tr>
              <td>ATAS NAMA</td>
              <td><?= $peserta->atasnama;?></td>
            </tr>
            <tr>
              <td>TANDA TANGAN</td>
              <td><img src="<?= $peserta->signature;?>" /></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?= $this->endSection() ?>
