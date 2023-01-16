
<?= $this->extend('Layout/wreaper'); ?>
<?= $this->section('content') ?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Administrator /</span> Management User
</h4>
<div class="row ">
<!-- Complex Headers -->
              <div class="card card-action">
              <div class="card-header align-items-center">
                <h5 class="card-action-title mb-0">Daftar User Login</h5>
                <div class="card-action-element">
                  <button class="btn btn-primary btn-md" type="button" data-bs-toggle="modal" data-bs-target="#add"><i class="bx bx-plus bx-xs me-1"></i>Tambah Data</button>
                </div>
              </div>
                <div class="card-datatable text-nowrap">
                  <table class="dt-complex-header table table-user">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Level</th>
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
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="" method="POST" id="fmlevel">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Tambah User Login</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="email" class="form-label">email</label>
                      <input type="email" id="email" name="emaill" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="pasword" class="form-label">Pasword</label>
                      <input type="password" id="pasword" name="pasword" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="password1" class="form-label">Confirm Password</label>
                      <input type="password" id="password1" name="password1" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="level" class="form-label">Level</label>
                      <select id="level" name="level" class="select2 form-select form-select-lg" data-allow-clear="true">
                          <option value="AK">Alaska</option>
                          <option value="HI">Hawaii</option>
                          <option value="CA">California</option>
                          <option value="NV">Nevada</option>
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
<?= $this->endSection() ?>
<?= $this->section('js') ?>
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
                url: '<?= base_url() ?>/userlogin/datatable',
                method: 'POST',
            },
        columns: [
                {
                    data: 'no',
                    className: 'text-center align-middle',
                    
                },
                {
                    data: 'email',
                    className: 'text-center align-middle',
                    
                },
                {
                    data: 'id_level',
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