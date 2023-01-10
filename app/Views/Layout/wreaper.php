<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?= base_url()?>/assets/"
  data-template="vertical-menu-template"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>
    LMSRPL | Admin
    </title>

    <!-- Favicon -->
    <link
      rel="icon"
      type="image/x-icon"
      href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico"
    />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/css/rtl/core.css" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/style.css"/>
    <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"/>
    <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/libs/typeahead-js/typeahead.css"/>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/libs/select2/select2.css">
    
    
    <!-- Vendors CSS -->
    
    <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/libs/sweetalert2/sweetalert2.css" />
    <?= $this->renderSection('css') ?>

    <!-- Helpers -->
    <script src="<?= base_url()?>/assets/vendor/js/helpers.js"></script>
    <script src="<?= base_url()?>/assets/vendor/js/template-customizer.js"></script>
    <script src="<?= base_url()?>/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php include "menus.php" ?>
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php include "navbar.php" ?>
          <!-- / Navbar -->
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-fluid flex-grow-1 container-p-y">
                <?= $this->renderSection('content') ?>
            </div>
            <!-- / Content -->
            <?= $this->rendersection('modal') ?>

            <!-- Footer -->
            <!-- / Footer -->
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url() ?>/assets/js/jquery-3.6.0.min.js"></script>
    <!-- <script src="<?= base_url()?>/assets/vendor/libs/jquery/jquery.js"></script> -->
    <!-- <script src="<?= base_url()?>/assets/vendor/libs/popper/popper.js"></script> -->
    <script src="<?= base_url()?>/assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url()?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <!-- <script src="<?= base_url()?>/assets/vendor/libs/hammer/hammer.js"></script> -->
    <!-- <script src="<?= base_url()?>/assets/vendor/libs/i18n/i18n.js"></script> -->
    <!-- <script src="<?= base_url()?>/assets/vendor/libs/typeahead-js/typeahead.js"></script> -->
    <script src="<?= base_url()?>/assets/vendor/js/menu.js"></script>
    <script src="<?= base_url()?>/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <?= $this->renderSection('js') ?>
    <!-- Main JS -->
    <script src="<?= base_url() ?>/assets/js/main.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/libs/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/libs/select2/select2.js"></script>
    <script src="<?= base_url() ?>/assets/js/forms-selects.js"></script>
    <script>
      function notifsuccess(ket) {
        Swal.fire({
          title: "Berhasil!",
          text: ket,
          icon: "success",
          customClass: { confirmButton: "btn btn-primary" },
          buttonsStyling: !1,
        });
      }

      function notifError(ket) {
        Swal.fire({
          title: "Gagal !",
          text: ket,
          icon: "error",
          customClass: { confirmButton: "btn btn-primary" },
          buttonsStyling: !1,
        });
      }
    </script>

    <!-- Page JS -->
  </body>

  <!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/layouts-fluid.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Nov 2022 02:04:16 GMT -->
</html>
