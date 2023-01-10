
<?= $this->extend('Layout/wreaper'); ?>
<?= $this->section('content') ?>
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Referensi /</span> Alamat</h4>
<div class="row mb-2">
  <div class="col"><h5>Daftar Alamat Wilayah Indonesia</h5></div>
  <div class="col d-flex justify-content-end">
    <button class="btn btn-primary btn-md" style="margin-right:5px;" data-bs-toggle="modal" data-bs-target="#addPro"><i class="bx bx-plus bx-xs me-1"></i> Provinsi</button>
    <button class="btn btn-success btn-md" style="margin-right:5px;" data-bs-toggle="modal" data-bs-target="#addKota"><i class="bx bx-plus bx-xs me-1"></i> Kota/Kabupaten</button>
    <button class="btn btn-warning btn-md" style="margin-right:5px;" data-bs-toggle="modal" data-bs-target="#addKec"><i class="bx bx-plus bx-xs me-1"></i> Kecamatan</button>
    <button class="btn btn-danger btn-md" data-bs-toggle="modal" data-bs-target="#addDesa"><i class="bx bx-plus bx-xs me-1"></i> Desa / Keluarahan</button>
  </div>
    
</div>
<div class="row">
  <!-- Accordion with Icon -->
  <div class="card mt-4 p-4 <?= (empty($dprov)) ? '' : 'd-none'; ?>">
      <h5 class="text-center">Tidak Ada Data</h5>
      <small class="text-center" style="margin:-10px;">silakan tambahkan data provinsi</small>
  </div>
  <div class="col-md mb-4 mb-md-2 <?= (empty($dprov)) ? 'd-none' : ''; ?>">
    <!-- <small class="text-light fw-semibold">Accordion With Icon (Always Open)</small> -->
    <?php
    foreach ($dprov as $prov) {
    ?>
    <div class="accordion mt-1" id="accordionWithIcon">
      <div class="accordion-item card">
        <h2 class="accordion-header d-flex align-items-center">
          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionWithIcon-<?= $prov->id; ?>" aria-expanded="false">
            <i class="bx bx-bar-chart-alt-2 me-2"></i>
            Provinsi <?= $prov->nama_prov; ?>
          </button>
        </h2>

        <div id="accordionWithIcon-<?= $prov->id; ?>" class="accordion-collapse collapse">
          <div class="accordion-body">
            <?php
              if ($dkota) {
                $nkota = 0;
                foreach ($dkota as $kota) {
                  if ($kota->id_prov == $prov->id) {
                  ?>
                  <div class="accordion-item card mt-1">
                <h2 class="accordion-header d-flex align-items-center">
                  <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionWithIcon-<?= $kota->id ?>" aria-expanded="false">
                    <i class="bx bx-briefcase me-2"></i>
                    <?= $kota->nama_kota ?>
                  </button>
                </h2>
                <div id="accordionWithIcon-<?= $kota->id ?>" class="accordion-collapse collapse">
                  <div class="accordion-body">
                              <?php
                          if ($dkec) {
                            $nkec = 0;
                            foreach ($dkec as $kec) {
                              if ($kec->id_kota == $kota->id) {
                              ?>
                              <div class="accordion-item card mt-1">
                            <h2 class="accordion-header d-flex align-items-center">
                              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionWithIcon-<?= $kec->id ?>" aria-expanded="false">
                                <i class="bx bx-briefcase me-2"></i>
                                <?= $kec->nama_kecamatan ?>
                              </button>
                            </h2>
                            <div id="accordionWithIcon-<?= $kec->id ?>" class="accordion-collapse collapse">
                              <div class="accordion-body">
                                      <?php  if ($ddesa) {
                                        $ndesa = 0;
                                      foreach ($ddesa as $desa) {
                                        if ($desa->id_kecamatan == $kec->id) {
                                        ?>
                                        <div class="accordion-item card mt-1">
                                      <h2 class="accordion-header d-flex align-items-center">
                                        <button type="button" class="accordion-button" aria-expanded="false">
                                          
                                          <?= $desa->nama_desa ?>
                                        </button>
                                      </h2>
                                    </div>
                                        <?php
                                        $ndesa++;
                                        }
                                      }
                                      if ($ndesa < 1) {
                                        ?>
                                        <div class="mt-1 p-4">
                                            <h5 class="text-center">Tidak Ada Data</h5>
                                            <p class="text-center" style="margin:-10px;">silakan tambahkan data Desa/Kelurahan dan pilih Kecamatan <?= $kec->nama_kecamatan; ?></p>
                                        </div>
                                        <?php
                                        }

                                    }else{
                                      ?>
                                      <div class="mt-1 p-4">
                                          <h5 class="text-center">Tidak Ada Data</h5>
                                          <p class="text-center" style="margin:-10px;">silakan tambahkan data Desa/Kelurahan dan pilih Kecamatan <?= $kec->nama_kecamatan; ?></p>
                                      </div>
                                      <?php
                                    }
                                      ?>
                              </div>
                            </div>
                          </div>
                              <?php
                              $nkec++;
                              }
                            }
                            if ($nkec < 1) {
                              ?>
                              <div class="mt-1 p-4">
                                  <h5 class="text-center">Tidak Ada Data</h5>
                                  <p class="text-center" style="margin:-10px;">silakan tambahkan data Kecamatan dan pilih <?= $kota->nama_kota; ?></p>
                              </div>
                              <?php
                              }
                            
                          }else{
                            ?>
                            <div class="mt-1 p-4">
                                <h5 class="text-center">Tidak Ada Data</h5>
                                <p class="text-center" style="margin:-10px;">silakan tambahkan data kecamatan dan pilih <?= $kota->nama_kota; ?></p>
                            </div>
                            <?php
                          }
                            ?>
                  </div>
                </div>
              </div>
                  <?php
                  $nkota++;
                  }
                }
                if ($nkota < 1) {
                              ?>
                              <div class="mt-1 p-4">
                                  <h5 class="text-center">Tidak Ada Data</h5>
                                  <p class="text-center" style="margin:-10px;">silakan tambahkan data Kota/Kabupaten dan pilih provinsi <?= $prov->nama_prov; ?></p>
                              </div>
                              <?php
                              }
              }else{
                ?>
                <div class="mt-1 p-4">
                    <h5 class="text-center">Tidak Ada Data</h5>
                    <p class="text-center" style="margin:-10px;">silakan tambahkan data Kota/Kabupaten dan pilih provinsi <?= $prov->nama_prov; ?></p>
                </div>
                <?php
              }
                ?>
          </div>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
    
  </div>
  <!--/ Accordion with Icon -->
</div>
<?= $this->endSection() ?>
<?= $this->section('modal')?>
<div class="modal fade" id="addPro" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form method="POST" id="fmprov">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Provinsi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="kd_prov" class="form-label">Kode Provinsi</label>
                      <input type="text" id="kd_prov" name="kd_prov" class="form-control">
                      <input type="hidden" id="pilih" name="pilih" value = "1">
                    </div>
                    <div class="form-group">
                      <label for="nmprov" class="form-label">Nama Provinsi</label>
                      <input type="text" id="nmprov" name="nama_prov" class="form-control">
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
  
          <div class="modal fade" id="addKota" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form method="POST" id="fmkota">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Kota/ Kabupaten</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                      <label for="prov" class="form-label">Provinsi</label>
                      <select id="prov" name="prov" class="select2 form-select form-select-lg" data-allow-clear="true">
                      <option value=""></option>
                                    <?php
                                    foreach ($dprov as $prov) {
                                        ?>
                                        <option value="<?= $prov->id; ?>"><?= $prov->nama_prov; ?></option>
                                        <?php
                                    }
                                    ?>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                      <label for="kd_kota" class="form-label">Kode Kota/ Kabupaten</label>
                      <input type="text" id="kd_kota" name="kd_kota" class="form-control">
                      <input type="hidden" id="pilih" name="pilih" value = "2">
                    </div>
                    <div class="form-group">
                      <label for="nama_kota" class="form-label">Nama Kota/ Kabupaten</label>
                      <input type="text" id="nama_kota" name="nama_kota" class="form-control">
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

          <div class="modal fade" id="addKec" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form method="POST" id="fmkec">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Kecamatan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                      <label for="kota" class="form-label">Kota / Kaabupaten</label>
                      <select id="kota" name="kota" class="select2 form-select form-select-lg" data-allow-clear="true">
                      <option value=""></option>
                                    <?php
                                    foreach ($dkota as $kota) {
                                        ?>
                                        <option value="<?= $kota->id; ?>"><?= $kota->nama_kota; ?></option>
                                        <?php
                                    }
                                    ?>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                      <label for="kd_kec" class="form-label">Kode Kecamatan</label>
                      <input type="text" id="kd_kec" name="kd_kec" class="form-control">
                      <input type="hidden" id="pilih" name="pilih" value = "3">
                    </div>
                    <div class="form-group">
                      <label for="nama_kec" class="form-label">Nama kecamatan</label>
                      <input type="text" id="nama_kec" name="nama_kec" class="form-control">
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

          <div class="modal fade" id="addDesa" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form method="POST" id="fmdesa">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Desa</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                      <label for="kec" class="form-label">Kecamatan</label>
                      <select id="kec" name="kec" class="select2 form-select form-select-lg" data-allow-clear="true">
                      <option value=""></option>
                                    <?php
                                    foreach ($dkec as $kec) {
                                        ?>
                                        <option value="<?= $kec->id; ?>"><?= $kec->nama_kecamatan; ?></option>
                                        <?php
                                    }
                                    ?>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                      <label for="kd_desa" class="form-label">Kode Desa/ Kelurahan</label>
                      <input type="text" id="kd_desa" name="kd_desa" class="form-control">
                      <input type="hidden" id="pilih" name="pilih" value = "4">
                    </div>
                    <div class="form-group">
                      <label for="nama_desa" class="form-label">Nama Desa/ Kelurahan</label>
                      <input type="text" id="nama_desa" name="nama_desa" class="form-control">
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
  $(document).ready(function () {
        falidasi_prov();
        falidasi_kota();
        falidasi_kec();
        falidasi_desa();
    });
    function falidasi_prov() {
    $.validator.setDefaults({
        submitHandler: function () {
            $.ajax({
                type:"POST",
                url:"<?= base_url() ?>/ref/alamat/simpan",
                data:$("#fmprov").serialize(),
                dataType:"JSON",
                success:function (response) {
                    if (response.status) {
                        console.log(response.status);
                        $('#addPro').modal('hide');
                        $('#fmprov')[0].reset();
                        notifsuccess("Data Berhasil Disimpan")
                        location.reload();
                    }else{
                        console.log(response.status);
                        $('#addPro').modal('hide');
                        $('#fmprov')[0].reset();
                        notifError("Data Gagak Disimpan")
                        location.reload();
                        
                    }
                }
            });
        },
      });
    $("#fmprov").validate({
          rules: {
            kd_prov: "required",
            nama_prov: "required",
          },
          messages: {
            kd_prov: "Kode Provinsi harus di isi !!!",
            nama_prov: "Nama Provinsi harus di isi !!!",
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
    function falidasi_kota() {
    $.validator.setDefaults({
        submitHandler: function () {
            $.ajax({
                type:"POST",
                url:"<?= base_url() ?>/ref/alamat/simpan",
                data:$("#fmkota").serialize(),
                dataType:"JSON",
                success:function (response) {
                    if (response.status) {
                        console.log(response.status);
                        $('#addKota').modal('hide');
                        $('#fmkota')[0].reset();
                        notifsuccess("Data Berhasil Disimpan")
                        location.reload();
                    }else{
                        $('#addKota').modal('hide');
                        $('#fmkota')[0].reset();
                        notifError("Data Gagak Disimpan")
                        location.reload();
                    }
                }
            });
        },
      });
    $("#fmkota").validate({
          rules: {
            kd_kota: "required",
            nama_kota: "required",
          },
          messages: {
            kd_kota: "Kode Kota harus di isi !!!",
            nama_kota: "Nama Kota harus di isi !!!",
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
    function falidasi_kec() {
    $.validator.setDefaults({
        submitHandler: function () {
            $.ajax({
                type:"POST",
                url:"<?= base_url() ?>/ref/alamat/simpan",
                data:$("#fmkec").serialize(),
                dataType:"JSON",
                success:function (response) {
                    if (response.status) {
                        console.log(response.status);
                        $('#addKec').modal('hide');
                        $('#fmkec')[0].reset();
                        notifsuccess("Data Berhasil Disimpan")
                        location.reload();
                    }else{
                        $('#addKec').modal('hide');
                        $('#fmkec')[0].reset();
                        notifError("Data Gagal Disimpan")
                        location.reload();
                    }
                }
            });
        },
      });
    $("#fmkec").validate({
          rules: {
            kd_kec: "required",
            nama_kec: "required",
          },
          messages: {
            kd_kec: "Kode Kecamatan harus di isi !!!",
            nama_kec: "Nama Kecamatan harus di isi !!!",
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
    function falidasi_desa() {
    $.validator.setDefaults({
        submitHandler: function () {
            $.ajax({
                type:"POST",
                url:"<?= base_url() ?>/ref/alamat/simpan",
                data:$("#fmdesa").serialize(),
                dataType:"JSON",
                success:function (response) {
                    if (response.status) {
                        console.log(response.status);
                        $('#addDesa').modal('hide');
                        $('#fmdesa')[0].reset();
                        notifsuccess("Data Berhasil Disimpan")
                        location.reload();
                    }else{
                        $('#addDesa').modal('hide');
                        $('#fmdesa')[0].reset();
                        notifError("Data Gagal Disimpan")
                        location.reload();
                    }
                }
            });
        },
      });
    $("#fmdesa").validate({
          rules: {
            kd_desa: "required",
            nama_desa: "required",
          },
          messages: {
            kd_desa: "Kode Desa / Kelurahan harus di isi !!!",
            nama_desa: "Nama Desa / Kelurahan harus di isi !!!",
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


          