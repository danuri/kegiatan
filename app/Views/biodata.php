<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-bs-theme="light" data-layout-width="fluid" data-layout-position="fixed" data-layout-style="default" data-sidebar-visibility="show">
<head>
  <meta charset="utf-8" />
  <title>Biodata Kegiatan | Kementerian Agama RI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Presensi Terintegrasi Kementerian Agama RI" name="description" />
  <meta content="Danunih" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/images/favicon.ico">

  <!-- Layout config Js -->
  <script src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/js/layout.js"></script>
  <!-- Bootstrap Css -->
  <link href="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
  <!-- Icons Css -->
  <link href="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/css/app.min.css" rel="stylesheet" type="text/css" />
  <!-- custom Css-->
  <link href="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/css/custom.min.css" rel="stylesheet" type="text/css" />

  <style media="screen">
  @media (min-width: 1200px){
    .container, .container-lg, .container-md, .container-sm, .container-xl {
      max-width: 800px;
    }
  }
  </style>
  <?= $this->renderSection('style') ?>

</head>

<body>
  <div class="container">
    <div class="row vh-100 justify-content-between align-items-center">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <img src="https://ropeg.kemenag.go.id/wp-content/uploads/2022/01/logo_kemenag-300x285.png" width="100px" alt="">
              <h3>BIODATA</h3>
              <hr>
              <h5><b><?= strtoupper($giat->satker);?></b></h5>
              <h5><?= $giat->kegiatan;?></h5>
              <h4><?= $giat->lokasi;?></h4>
              <h6><?= $giat->kota.', '.$giat->waktu_awal;?></h6>
            </div>
            <hr>
            <form method="post" action="<?= site_url('biodata/save/'.$giat->kode);?>" id="form">
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">NIP</label>
                </div>
                <div class="col-lg-9">
                  <div class="input-group">
                    <input type="text" class="form-control" name="nip" id="nip" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-success" type="button" id="button-addon2" onclick="checksimpeg()">Check</button>
                  </div>
                  Silakan isi secara manual jika bukan dari Kementerian Agama.
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Nama Lengkap</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="nama" id="nama">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Jabatan</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="jabatan" name="jabatan">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Pangkat/Golongan</label>
                </div>
                <div class="col-lg-4">
                  <input type="text" class="form-control" id="pangkat" name="pangkat">
                </div>
                <div class="col-lg-4">
                  <input type="text" class="form-control" id="golongan" name="golongan">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Unit Kerja / Instansi</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="instansi" name="instansi">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Alamat Kantor</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="alamatkantor" name="alamatkantor">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Alamat Rumah</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="alamatrumah" name="alamatrumah">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Email</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="email" name="email">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Nomor HP (WA)</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="nohp" name="nohp">
                </div>
              </div>
              <?php if($giat->rekening == 1){ ?>
                <div class="row mb-3">
                  <div class="col-lg-3">
                    <label for="nameInput" class="form-label">NPWP</label>
                  </div>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="npwp" name="npwp">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-lg-3">
                    <label for="nameInput" class="form-label">Nama Bank</label>
                  </div>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="bank" name="bank">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-lg-3">
                    <label for="nameInput" class="form-label">Nomor Rekening</label>
                  </div>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="norek" name="norek">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-lg-3">
                    <label for="nameInput" class="form-label">Rekening Atas Nama</label>
                  </div>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="atasnama" name="atasnama">
                  </div>
                </div>
              <?php } ?>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label"></label>
                </div>
                <div class="col-lg-9">
                  <div class="card">
                    <div class="card-header">Tanda Tangan</div>
                    <div class="card-body">
                      <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
                      <input type="hidden" name="signpad" id="signpad" value="">
                    </div>
                    <div class="card-footer">
                      <button type="button" id="clearpad" name="button" class="btn btn-danger btn-sm">Clear</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/libs/simplebar/simplebar.min.js"></script>
  <script src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/libs/node-waves/waves.min.js"></script>
  <script src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/libs/feather-icons/feather.min.js"></script>
  <script src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script type="text/javascript">

  $(document).ready(function() {
    var canvas = document.querySelector("canvas");
    var signaturePad = new SignaturePad(canvas);

    $('#clearpad').on('click', function(event) {
      signaturePad.clear();
    });

    $("#form").on('submit', function(event) {
      var sign = signaturePad.toDataURL();

      if(signaturePad.isEmpty()){
        alert('Silakan ditanda tangani terlebih dahulu.');
        return false;
      }
      sign = sign.replace("data:image/png;base64,", "");
      $('#signpad').val(sign);
      return true;
    });
  });

  function checksimpeg() {
    var nip = $('#nip').val();
    var kode = '<?= $giat->kode;?>';

    $.get('<?= site_url('checkpegawai')?>/'+nip, function(result) {
      if(result['status'] == 1){

        Swal.fire({
        text: 'Masukan Password SIMPEG untuk menampilkan data. Atau Anda bisa mengisi secara manual.',
        input: 'password',
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Tampilkan',
        showLoaderOnConfirm: true,
        preConfirm: (login) => {
          return fetch('<?= site_url('getpegawai')?>/'+nip+'/'+login)
            .then(response => {
              if (!response.ok) {
                throw new Error(response.statusText)
              }
              return response.json()
            })
            .catch(error => {
              Swal.showValidationMessage(
                `Request failed: ${error}`
              )
            })
        },
        allowOutsideClick: () => !Swal.isLoading()
      }).then((result) => {
        if (result.isConfirmed) {
          $('#nama').val(result.value.NAMA_LENGKAP);
          $('#jabatan').val(result.value.TAMPIL_JABATAN);
          $('#pangkat').val(result.value.PANGKAT);
          $('#golongan').val(result.value.GOL_RUANG);
          $('#instansi').val(result.value.SATKER_3+' '+result.value.SATKER_4);
          // $('#alamatkantor').val();
          $('#alamatrumah').val(result.value.ALAMAT_1);
          $('#email').val(result.value.EMAIL);
          $('#nohp').val(result.value.NO_HP);
          $('#npwp').val(result.value.lain.NPWP);
          $('#bank').val(result.value.lain.KODE_BANK);
          $('#norek').val(result.value.lain.NO_REKENING);
          $('#atasnama').val(result.value.lain.ATASNAMA_BANK);
        }
      });

      }
    });
  }

  function loader() {
    $("#loverlay").fadeIn(300);
  }
  </script>
  <?= $this->renderSection('script') ?>
</body>

</html>
