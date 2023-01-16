
<?= $this->extend('Layout/wreaper'); ?>
<?= $this->section('content') ?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light"><?= (!empty($bc)) ? $bc : '';  ?>  <?= (!empty($bc1)) ? $bc1.'/</span>' : ''; ?>
</h4>
<div class="row ">
<!-- Complex Headers -->
              <div class="card card-action">
              <div class="card-header align-items-center">
                <h5 class="card-action-title mb-0">Daftar User</h5>
                <div class="card-action-element">
                  <button class="btn btn-primary btn-md" type="button" data-bs-toggle="modal" data-bs-target="#add"><i class="bx bx-plus bx-xs me-1"></i>Tambah Data</button>
                </div>
              </div>
                <div class="card-datatable text-nowrap">
                  <table class="dt-complex-header table table-user">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
              <!--/ Complex Headers -->

</div>
<?= $this->endSection() ?>
<?= $this->section('modal')?>
        <div class="modal fade" id="add" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <form action="" method="POST" id="fmuser">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Tambah User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-6 form-group mt-2">
                      <label for="nik" class="form-label">NIK</label>
                      <input type="text" id="nik" name="nik" class="form-control">
                    </div>
                    <div class="col-6 form-group mt-2">
                      <label for="nm_user" class="form-label">Nama Lengkap</label>
                      <input type="text" id="nm_user" name="nm_user" class="form-control">
                    </div>
                    <div class="col-6 form-group mt-2">
                      <label for="tmp_lahir" class="form-label">Tempat Lahir</label>
                      <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control">
                    </div>
                    <div class="col-6 form-group mt-2">
                      <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                      <input type="text" id="bs-datepicker-basic" name="tgl_lahir" class="form-control">
                    </div>
                    <div class="col-6 form-group mt-2">
                      <label for="tgl_lahir" class="form-label">Jenis Kelamin</label>
                      <div class="row ms-1">
                          <div class="form-check col-6">
                            <input name="gender" class="form-check-input" type="radio" value="L" id="laki">
                            <label class="form-check-label" for="laki">
                              Laki - Laki
                            </label>
                          </div>
                          <div class="form-check col-6">
                              <input name="gender" class="form-check-input" type="radio" value="P" id="permpuan">
                              <label class="form-check-label" for="permpuan">
                                Perempuan
                              </label>
                          </div>
                      </div>
                    </div>
                    <div class="col-6 form-group mt-2">
                      <label for="tlp" class="form-label">No Hp</label>
                      <input type="text" id="tlp" name="tlp" class="form-control">
                    </div>
                    <div class="col-6 form-group mt-2">
                      <label for="pekerjaan" class="form-label">Pekerjaan</label>
                      <input type="text" id="pekerjaan" name="pekerjaan" class="form-control">
                    </div>
                    <div class="col-6 form-group mt-2">
                      
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-6 form-group mt-2">
                        <label for="prov" class="form-label">Provinsi</label>
                        <select id="prov" name="prov" class="select2 form-select form-select-lg" data-allow-clear="true">
                        <option value=""></option>
                                    <?php
                                      foreach ($dprov as $prov) {
                                          ?>
                                          <option value="<?= $prov->id; ?>"><?= $prov->nama_prov; ?></option>
                                          <?php
                                      }
                                    ?>>
                          </select>
                      </div>
                      <div class="col-6 form-group mt-2">
                        <label for="kota" class="form-label">Kota/ Kab</label>
                          <select id="kota" name="kota" class="select2 form-select form-select-lg" data-allow-clear="true">
                            <option value=""></option>>
                          </select>
                      </div>
                      <div class="col-6 form-group mt-2">
                        <label for="kec" class="form-label">Kecamatan</label>
                          <select id="kec" name="kec" class="select2 form-select form-select-lg" data-allow-clear="true">
                            <option value=""></option>
                          </select>
                      </div>
                      <div class="col-6 form-group mt-2">
                        <label for="desa" class="form-label">Desa / Kelurahan</label>
                          <select id="desa" name="desa" class="select2 form-select form-select-lg" data-allow-clear="true">
                            <option value=""></option>
                          </select>
                      </div>
                      <div class="form-group mt-2">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" id="alamat" name="alamat" class="form-control">
                      </div>
                    </div>
                    <div class="form-group mt-2">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="row">
                      <div class="col-6 form-group mt-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                      </div>
                      <div class="col-6 form-group mt-2">
                        <label for="password1" class="form-label">Confirm Password</label>
                        <input type="password" id="password1" name="password1" class="form-control">
                      </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="level" class="form-label">Level User</label>
                        <select id="level" name="level" class="select2 form-select form-select-lg" data-allow-clear="true">
                        <option value=""></option>
                                    <?php
                                      foreach ($dlevel as $level) {
                                          ?>
                                          <option value="<?= $level->id; ?>"><?= $level->nama_level; ?></option>
                                          <?php
                                      }
                                    ?>>
                          </select>
                      </div>
                    <div class="form-group mt-2">
                      <label for="status" class="form-label">Status</label>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="status" name="status">
                            <!-- <label class="form-check-label" for="status">Checked switch checkbox input</label> -->
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
<?= $this->endSection() ?>
<?= $this->section('css')?>
    <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/libs/flatpickr/flatpickr.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/libs/jquery-timepicker/jquery-timepicker.css" />
    <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/libs/pickr/pickr-themes.css" />
<?= $this->endSection() ?>
<?= $this->section('js') ?>
    <script src="<?= base_url() ?>/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/libs/pickr/pickr.js"></script>
<script>
    var table;
    $(document).ready(function() {
      loadtable();
      dateinput();
      loadAlamat();
      validasiSimpan();
    });
    function loadtable() {
    tabel = $('.table-user').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: true,
            info: true,
            paging: true,
            searching: true,
        order: [],
        ajax: {
                url: '<?= base_url() ?>/user/datatable',
                method: 'POST',
            },
        columns: [
                {
                    data: 'no',
                    className: 'text-center align-middle',
                    
                },
                {
                    data: 'person',
                    className: 'text-center align-middle',
                    
                },
                {
                    data: 'st',
                    className: 'text-center align-middle',
                    
                },
                {
                    data: 'action',
                    orderable: false,
                    className: 'text-left align-middle',
                    
                },
            ],
    });
    }
    function dateinput() {
      var e = $("#bs-datepicker-basic");
      e =
        (e.length &&
          e.datepicker({
            todayHighlight: !0,
            format: "yyyy/mm/dd",
            orientation: isRtl ? "auto right" : "auto left",
          }),$("#bs-rangepicker-basic"))
    }
    function loadAlamat() {
    $('#prov').on("change", function () {
        const id = $(this).val();
        $.ajax({
        type:"POST",
        url:"<?= base_url() ?>/alamat/getkota",
        data:{"id" : id},
        success:function (data) {
            $("#kota").html(data);
        }
        });
    });
    $('#kota').on("change", function () {
        const id = $(this).val();
        $.ajax({
        type:"POST",
        url:"<?= base_url() ?>/alamat/getkec",
        data:{"id" : id},
        success:function (data) {
            $("#kec").html(data);
        }
        });
    });
    $('#kec').on("change", function () {
        const id = $(this).val();
        $.ajax({
        type:"POST",
        url:"<?= base_url() ?>/alamat/getdesa",
        data:{"id" : id},
        success:function (data) {
            $("#desa").html(data);
        }
        });
    });
    }
    function validasiSimpan() {
    $.validator.setDefaults({
        submitHandler: function () {
            $.ajax({
                type:"POST",
                url:"<?= base_url() ?>/user/simpan",
                data:$("#fmuser").serialize(),
                dataType:"JSON",
                success:function (response) {
                    if (response.status) {
                        console.log(response.status);
                        $('#add').modal('hide');
                        $('#fmuser')[0].reset();
                        notifsuccess("Data Berhasil Disimpan")
                        location.reload();
                    }else{
                        $('#add').modal('hide');
                        $('#fmuser')[0].reset();
                        notifError("Data Gagal Disimpan")
                        location.reload();
                    }
                }
            });
        },
      });
    $("#fmuser").validate({
          rules: {
            nik: "required",
            nm_user: "required",
            tmp_lahir: "required",
            tgl_lahir: "required",
            gender: "required",
            tlp: "required",
            pekerjaan: "required",
            alamat: "required",
            prov: "required",
            kota: "required",
            kec: "required",
            desa: "required",
            email:  {required:true, email:true},
            password: "required",
            password1: {required:true,equalTo: 'input[name="password"]'},
            level: "required",
          },
          messages: {
            nik: "NIK harus di isi !!!",
            nm_user: "Nama Lengkap Harus di isi !!!",
            tmp_lahir: "Tempat Lahir Harus di isi !!!",
            tgl_lahir: "Tanggal Lahir Harus di isi !!!",
            gender: "Jenis Kelamin Harus di isi !!!",
            tlp: "Nomor Hp Harus di isi !!!",
            pekerjaan: "Pekerjaan Harus di isi !!!",
            alamat: "Alamat Harus di isi !!!",
            prov: "Provinsi Harus di isi !!!",
            kota: "Kota/ Kabupaten Harus di isi !!!",
            kec: "Kecamatan Harus di isi !!!",
            desa: "Desa / Kelurahan Harus di isi !!!",
            email: {required:"Email harus di isi !!!", email:"Isi denga email yang falid !!"},
            password: "Password Harus di isi !!!",
            password1: {required:"Confirm Password harus di sisi !!!",equalTo:"Pasword yang di masukan tidak sesuai"},
            level: "Level User Harus di isi !!!",
          },
        //   errorElement: "em",
          errorPlacement: function (error, element) {
            var $el = $(element);
            var $parent = $el.parents(".form-group");
            $el.addClass('is-invalid');

                // Do not duplicate errors
                if ($parent.find(".jquery-validation-error").length) {
                return;
                }

                $parent.append(
                error.addClass(
                    "jquery-validation-error small form-text invalid-feedback"
                )
                );
          },
          highlight: function (element, errorClass, validClass) {
            var $el = $(element);
            var $parent = $el.parents(".form-group");
            $el.addClass('mb-1 is-invalid');
            // $(element)
            //   .parents(".form-grup")
            //   .addClass("is-invalid")
            //   .removeClass("is-valid");
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element)
              .parents(".form-grup")
              .addClass("is-valid")
              .removeClass("is-invalid");
          },
        });
    }
</script>
<?= $this->endSection() ?>