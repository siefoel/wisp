
<?= $this->extend('Layout/wreaper'); ?>
<?= $this->section('content') ?>
<h4 class="fw-bold py-3 mb-2">
  <span class="text-muted fw-light">Referensi /</span> Jurusan
</h4>
<div class="row m-1">
<!-- Complex Headers -->
            <div class="card card-action">
                <div class="card-header align-items-center">
                  <h5 class="card-action-title mb-0">Daftar Jurusan</h5>
                  <div class="card-action-element">
                    <button class="btn btn-primary btn-md" type="button" data-bs-toggle="modal" data-bs-target="#add"><i class="bx bx-plus bx-xs me-1"></i>Tambah Data</button>
                  </div>
                </div>
                <div class="card-datatable text-nowrap">
                  <table class="dt-complex-header table table-jurusan">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Jurusan</th>
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
                <form action="" method="POST" id="fmjurusan">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Jurusan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="kdjurusan" class="form-label">Kode Jurusan</label>
                      <input type="text" id="kdjurusan" name="kd_jurusan" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="nmjurusan" class="form-label">Nama Jurusan</label>
                      <input type="text" id="nmjurusan" name="nama_jurusan" class="form-control">
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
      falidasi_jurusan()
      loadtable()
    });
    function loadtable() {
    tabel = $('.table-jurusan').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: true,
            info: true,
            paging: true,
            searching: true,
        order: [],
        ajax: {
                url: '<?= base_url() ?>/ref/datajurusan',
                method: 'POST',
            },
        columns: [{
                    data: 'no',
                    orderable: false,
                    className: 'text-center align-middle',
                    
                },
                {
                    data: 'kode_jurusan',
                    className: 'text-center align-middle',
                    
                },
                {
                    data: 'nama_jurusan',
                    className: 'text-center align-middle',
                    
                },
                {
                    data: 'action',
                    orderable: false,
                    className: 'text-center align-middle',
                    
                },
            ],
    });
}
    function falidasi_jurusan() {
    $.validator.setDefaults({
        submitHandler: function () {
            $.ajax({
                type:"POST",
                url:"<?= base_url() ?>/ref/sjurusan",
                data:$("#fmjurusan").serialize(),
                dataType:"JSON",
                success:function (response) {
                    if (response.status) {
                        console.log(response.status);
                        $('#add').modal('hide');
                        $('#fmjurusan')[0].reset();
                        notifsuccess("Data Berhasil Disimpan")
                        location.reload();
                    }else{
                        console.log(response.status);
                        $('#add').modal('hide');
                        $('#fmjurusan')[0].reset();
                        notifError("Data Gagak Disimpan")
                        location.reload();
                        
                    }
                }
            });
        },
      });
    $("#fmjurusan").validate({
          rules: {
            kd_jurusan: "required",
            nama_jurusan: "required",
          },
          messages: {
            kd_jurusan: "Kode Jurusan harus di isi !!!",
            nama_jurusan: "Nama Jurusan harus di isi !!!",
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


          