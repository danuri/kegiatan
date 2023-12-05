<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-bs-theme="light" data-layout-width="fluid" data-layout-position="fixed" data-layout-style="default" data-sidebar-visibility="show">
<head>
  <meta charset="utf-8" />
  <title>Kegiatan | Kementerian Agama RI</title>
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
  <!-- Begin page -->
  <div id="layout-wrapper">

    <header id="page-topbar">
      <div class="layout-width">
        <div class="navbar-header">
          <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box horizontal-logo">
              <a href="<?= site_url()?>" class="logo logo-dark">
                <span class="logo-sm">
                  <img src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                  <img src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/images/logo-hrms.png" alt="" height="45"> Presensi
                </span>
              </a>

              <a href="index.html" class="logo logo-light">
                <span class="logo-sm">
                  <img src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                  <img src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/images/logo-hrms-light.png" alt="" height="17">
                </span>
              </a>
            </div>

            <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
              <span class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </button>
          </div>

          <div class="d-flex align-items-center">



            <div class="dropdown topbar-head-dropdown ms-1 header-item">
              <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class='bx bx-category-alt fs-22'></i>
              </button>
              <div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
                <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                  <div class="row align-items-center">
                    <div class="col">
                      <h6 class="m-0 fw-semibold fs-15"> Web Apps </h6>
                    </div>
                    <div class="col-auto">
                      <a href="#!" class="btn btn-sm btn-soft-info"> View All Apps
                        <i class="ri-arrow-right-s-line align-middle"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="p-2">
                    <div class="row g-0">
                      <div class="col">
                        <a class="dropdown-icon-item" href="https://hrms.kemenag.go.id">
                          <img src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/images/brands/github.png" alt="HRMS">
                          <span>HRMS</span>
                        </a>
                      </div>
                      <div class="col">
                        <a class="dropdown-icon-item" href="https://presensi.kemenag.go.id">
                          <img src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/images/brands/bitbucket.png" alt="Presensi">
                          <span>Presensi v.1</span>
                        </a>
                      </div>
                      <div class="col">
                        <a class="dropdown-icon-item" href="https://ropeg.kemenag.go.id/satya">
                          <img src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/images/brands/dribbble.png" alt="dribbble">
                          <span>Satyalancana</span>
                        </a>
                      </div>
                    </div>

                    <!-- <div class="row g-0">
                      <div class="col">
                        <a class="dropdown-icon-item" href="#!">
                          <img src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/images/brands/dropbox.png" alt="dropbox">
                          <span>Dropbox</span>
                        </a>
                      </div>
                      <div class="col">
                        <a class="dropdown-icon-item" href="#!">
                          <img src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/images/brands/mail_chimp.png" alt="mail_chimp">
                          <span>Mail Chimp</span>
                        </a>
                      </div>
                      <div class="col">
                        <a class="dropdown-icon-item" href="#!">
                          <img src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/images/brands/slack.png" alt="slack">
                          <span>Slack</span>
                        </a>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>


              <div class="ms-1 header-item d-none d-sm-flex">
                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                  <i class='bx bx-fullscreen fs-22'></i>
                </button>
              </div>

              <div class="ms-1 header-item d-none d-sm-flex">
                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                  <i class='bx bx-moon fs-22'></i>
                </button>
              </div>

                      <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="https://ropeg.kemenag.go.id/logo_kemenag.png" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                              <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?= session('nama')?></span>
                              <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"><?= session('jabatan')?></span>
                            </span>
                          </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <h6 class="dropdown-header">Welcome <?= session('nama')?>!</h6>
                          <a class="dropdown-item" href="https://sso.kemenag.go.id"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                          <a class="dropdown-item" href="<?= site_url('changelog')?>"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Change Log</span></a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="<?= site_url('auth/logout') ?>"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </header>

            <!-- removeNotificationModal -->
            <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mt-2 text-center">
                      <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                      <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                      </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                      <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                    </div>
                  </div>

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <div class="app-menu navbar-menu">
              <!-- LOGO -->
              <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                  <span class="logo-sm">
                    <img src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/images/logo-sm.png" alt="" height="22">
                  </span>
                  <span class="logo-lg">
                    <img src="<?= base_url('assets/images')?>/logo-ropeg.png" alt="" height="30">
                  </span>
                </a>
                <a href="index.html" class="logo logo-light">
                  <span class="logo-sm">
                    <img src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/images/logo-sm.png" alt="" height="22">
                  </span>
                  <span class="logo-lg">
                    <img src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/images/logo-light.png" alt="" height="17">
                  </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                  <i class="ri-record-circle-line"></i>
                </button>
              </div>

              <div id="scrollbar">
                <div class="container-fluid">

                  <div id="two-column-menu">
                  </div>
                  <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                    <li class="nav-item">
                      <a class="nav-link menu-link" href="<?= site_url()?>">
                        <i class=" ri-home-3-line"></i> <span data-key="t-landing">Beranda</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="ri-uninstall-line"></i> <span data-key="t-landing">Pengelola</span>
                      </a>
                      <div class="collapse menu-dropdown" id="sidebarLanding">
                        <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                            <a href="<?= site_url('pengelola/kegiatan')?>" class="nav-link" data-key="t-one-page"> Kegiatan </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?= site_url('pengelola/perjadin')?>" class="nav-link" data-key="t-nft-landing"> Perjalanan Dinas </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?= site_url('pengelola/setting')?>" class="nav-link" data-key="t-nft-landing"> Pengaturan </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="sidebar-background"></div>
            </div>

            <div class="vertical-overlay"></div>

            <div class="main-content">
              <?= $this->renderSection('content') ?>

              <footer class="footer">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-sm-6">
                      2023 © Ropeg Kemenag.
                    </div>
                    <div class="col-sm-6">
                      <div class="text-sm-end d-none d-sm-block">
                        by Biro Kepegawaian
                      </div>
                    </div>
                  </div>
                </div>
              </footer>
            </div>
          </div>

          <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
          </button>

          <div id="preloader">
            <div id="status">
              <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
          </div>

          <script src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
          <script src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/libs/simplebar/simplebar.min.js"></script>
          <script src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/libs/node-waves/waves.min.js"></script>
          <script src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/libs/feather-icons/feather.min.js"></script>
          <script src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
          <script src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/js/plugins.js"></script>

          <script src="https://d2mj1s7x3czrue.cloudfront.net/hrms/assets/js/app.js"></script>

          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
          <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
          <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

          <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

          <script type="text/javascript">
          $('.datatable').DataTable({
                            dom:"Bfrtip",
                            buttons:["copy","excel","print","pageLength"],
                            lengthMenu: [
                              [10, 25, 50, 100, -1],
                              [10, 25, 50, 100, 'Semua'],
                            ],
                        });

          function alert($text) {
            Toastify({
              text: $text,
              duration: 5000,
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "center", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
            }).showToast();
          }

          <?php
          if(session()->getFlashdata('message')){
            ?>
            alert("<?= session()->getFlashdata('message')?>");
            <?php
          }
          ?>

          function loader() {
            $("#loverlay").fadeIn(300);
          }
          </script>
          <?= $this->renderSection('script') ?>
        </body>

        </html>
