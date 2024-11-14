<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-bs-theme="light" data-layout-width="fluid" data-layout-position="fixed" data-layout-style="default" data-sidebar-visibility="show">
<head>
  <meta charset="utf-8" />
  <title>Biodata Kegiatan | Kementerian Agama RI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Presensi Terintegrasi Kementerian Agama RI" name="description" />
  <meta content="Danunih" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?= base_url()?>assets/images/favicon.ico">

  <!-- Layout config Js -->
  <script src="<?= base_url()?>assets/js/layout.js"></script>
  <!-- Bootstrap Css -->
  <link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
  <link href="<?= base_url()?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
  <!-- Icons Css -->
  <link href="<?= base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="<?= base_url()?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
  <!-- custom Css-->
  <link href="<?= base_url()?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />

  <style media="screen">
  @media (min-width: 1200px){
    .container, .container-lg, .container-md, .container-sm, .container-xl {
      max-width: 800px;
    }
  }

  #loverlay{
	position: fixed;
	top: 0;
	z-index: 100000;
	width: 100%;
	height:100%;
	display: none;
	background: rgba(0,0,0,0.6);
	}
	.cv-spinner {
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	}
	.spinner {
	width: 40px;
	height: 40px;
	border: 4px #ddd solid;
	border-top: 4px #2e93e6 solid;
	border-radius: 50%;
	animation: sp-anime 0.8s infinite linear;
	}
	@keyframes sp-anime {
	100% {
		transform: rotate(360deg);
	}
	}
	.is-hide{
	display:none;
	}
  .progressx {
    width: 100px;
  	height: 40px;
    margin-top: 25px;
    padding-left: 10px;
    color: #fff;
	}
  </style>
  <?= $this->renderSection('style') ?>

</head>

<body>
  <div id="loverlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
    <span class="progressx">Loading...</span>
  </div>
  </div>

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
                    <input type="number" class="form-control" name="nip" id="nip" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-success" type="button" id="button-addon2" onclick="checksimpeg()">Check</button>
                  </div>
                  Silakan isi secara manual jika bukan dari Kementerian Agama. Isi NIK jika Non ASN
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Nama Lengkap</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Jabatan</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Pangkat/Golongan</label>
                </div>
                <div class="col-lg-4">
                  <input type="text" class="form-control" id="pangkat" name="pangkat" required>
                </div>
                <div class="col-lg-4">
                  <input type="text" class="form-control" id="golongan" name="golongan" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Unit Kerja / Instansi</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="instansi" name="instansi" required>
                  <input type="hidden" name="kode_instansi" id="kode_instansi" value="">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Alamat Kantor</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="alamatkantor" name="alamatkantor" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Alamat Rumah</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="alamatrumah" name="alamatrumah" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Email</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="email" name="email" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="nameInput" class="form-label">Nomor HP (WA)</label>
                </div>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="nohp" name="nohp" required>
                </div>
              </div>
              <?php if($giat->rekening == 1){ ?>
                <div class="row mb-3">
                  <div class="col-lg-3">
                    <label for="nameInput" class="form-label">NPWP</label>
                  </div>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="npwp" name="npwp" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-lg-3">
                    <label for="nameInput" class="form-label">Nama Bank</label>
                  </div>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="bank" name="bank" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-lg-3">
                    <label for="nameInput" class="form-label">Nomor Rekening</label>
                  </div>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="norek" name="norek" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-lg-3">
                    <label for="nameInput" class="form-label">Rekening Atas Nama</label>
                  </div>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="atasnama" name="atasnama" required>
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

  <script src="<?= base_url()?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url()?>assets/libs/simplebar/simplebar.min.js"></script>
  <script src="<?= base_url()?>assets/libs/node-waves/waves.min.js"></script>
  <script src="<?= base_url()?>assets/libs/feather-icons/feather.min.js"></script>
  <script src="<?= base_url()?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
  <script src="<?= base_url()?>assets/libs/sweetalert2/sweetalert2.min.js"></script>

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
    loader();
    var nip = $('#nip').val();
    var kode = '<?= $giat->kode;?>';

    $.get('<?= site_url('checkpegawai')?>/'+nip, function(result) {
      if(result['status'] == 1){
        $("#loverlay").fadeOut(300);
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
          $('#kode_instansi').val(result.value.KODE_SATKER_3);
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

    }else{
      alert('NIP tidak ditemukan');
      $("#loverlay").fadeOut(300);
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
