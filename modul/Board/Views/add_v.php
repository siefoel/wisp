
<?= $this->extend('Layout/wreaper'); ?>
<?= $this->section('content') ?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light"><?= (!empty($bc)) ? $bc : '';  ?>  <?= (!empty($bc1)) ? '/</span>'.$bc1 : ''; ?>
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
                      <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control">
                    </div>
                    <div class="col-6 form-group mt-2">
                      <label for="tgl_lahir" class="form-label">Jenis Kelamin</label>
                      <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control">
                    </div>
                    <div class="col-6 form-group mt-2">
                      <label for="tgl_lahir" class="form-label">No Hp</label>
                      <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control">
                    </div>
                    <div class="col-6 form-group mt-2">
                      <label for="tgl_lahir" class="form-label">Pekerjaan</label>
                      <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control">
                    </div>
                    <div class="col-6 form-group mt-2">
                      
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-6 form-group mt-2">
                        <label for="prov" class="form-label">Provinsi</label>
                        <select id="prov" name="prov" class="select2 form-select form-select-lg" data-allow-clear="true">
                            <option value="AK">Alaska</option>
                            <option value="HI">Hawaii</option>
                            <option value="CA">California</option>
                            <option value="NV">Nevada</option>
                          </select>
                      </div>
                      <div class="col-6 form-group mt-2">
                        <label for="kota" class="form-label">Kota/ Kab</label>
                        <select id="kota" name="kota" class="select2 form-select form-select-lg" data-allow-clear="true">
                            <option value="AK">Alaska</option>
                            <option value="HI">Hawaii</option>
                            <option value="CA">California</option>
                            <option value="NV">Nevada</option>
                          </select>
                      </div>
                      <div class="col-6 form-group mt-2">
                        <label for="kec" class="form-label">Kecamatan</label>
                        <select id="kec" name="kec" class="select2 form-select form-select-lg" data-allow-clear="true">
                            <option value="AK">Alaska</option>
                            <option value="HI">Hawaii</option>
                            <option value="CA">California</option>
                            <option value="NV">Nevada</option>
                          </select>
                      </div>
                      <div class="col-6 form-group mt-2">
                        <label for="desa" class="form-label">Desa</label>
                        <select id="desa" name="desa" class="select2 form-select form-select-lg" data-allow-clear="true">
                            <option value="AK">Alaska</option>
                            <option value="HI">Hawaii</option>
                            <option value="CA">California</option>
                            <option value="NV">Nevada</option>
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
</script>
<?= $this->endSection() ?>