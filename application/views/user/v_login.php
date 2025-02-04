<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Pilkosis
  </title>
  <!-- Favicon -->
  <link href="<?= base_url() ?>/assets/images/kpo.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?= base_url() ?>/assets/argon/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="<?= base_url() ?>/assets/argon/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?= base_url() ?>/assets/argon/assets/css/argon-dashboard.css?v=1.1.1" rel="stylesheet" />
  <link href="<?= base_url() ?>/assets/sbadmin/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet" />
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-success py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-4">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Sistem Informasi Pemilihan</h1>
              <p class="text-lead text-light">SMK NEGERI 1 KEBUMEN</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center font-weight-bold mb-4">
                Login
                <br>
                <?= $this->session->flashdata('info'); ?>
              </div>
              <form role="form" action="<?= site_url('/Login/validasi'); ?>" method="post">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nis/Username" type="text" name="username" value="<?= set_value('username'); ?>" autocomplete="off">
                  </div>
                  <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password" id="password">
                  </div>
                  <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id="tampilPass" type="checkbox">
                  <label class="custom-control-label" for="tampilPass">
                    <span class="text-muted">Tampilkan Password</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4 d-block w-100">Masuk</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="py-5">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              © <?= date('Y') ?> <a href="#" class="font-weight-bold ml-1">Unity Dev</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="#" class="nav-link">Powered By</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-white"><i class="fas fa-code"></i> Archer Syntax</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core   -->
  <script src="<?= base_url() ?>/assets/argon/assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/argon/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="<?= base_url() ?>/assets/argon/assets/js/argon-dashboard.min.js?v=1.1.1"></script>
  <script src="<?= base_url() ?>/assets/sbadmin/vendor/sweetalert2/sweetalert2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#tampilPass').click(function() {
        $(this).is(':checked') ? $('#password').attr('type', 'text') : $('#password').attr('type', 'password');
      });
    });
  </script>
</body>

</html>