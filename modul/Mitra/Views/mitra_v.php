
<?= $this->extend('Layout/wreaper'); ?>
<?= $this->section('content') ?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light"><?= (!empty($bc)) ? $bc : '';  ?>  <?= (!empty($bc1)) ? $bc1.'/</span>' : ''; ?>
</h4>
<div class="row ">
<!-- Complex Headers -->
              <div class="card card-action">
              <div class="card-header align-items-center">
                <h5 class="card-action-title mb-0">Daftar Mitra</h5>
                <div class="card-action-element">
                  <button class="btn btn-primary btn-md d-none" type="button" data-bs-toggle="modal" data-bs-target="#add"><i class="bx bx-plus bx-xs me-1"></i>Tambah Data</button>
                </div>
              </div>
                <div class="card-datatable text-nowrap">
                  <table class="datatables-basic table table-mitra">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Mitra</th>
                        <th>Owner</th>
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
                <form action="" method="POST" id="fmmitra">
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
    });
    function loadtable() {
    tabel = $('.table-mitra').DataTable({
          buttons: [
                {
                  text: '<i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">Tambah</span>',
                  className: "create-new btn btn-primary",
                },
              ],
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: true,
            info: true,
            paging: true,
            searching: true,
        order: [],
        ajax: {
                url: '<?= base_url() ?>/mitra/datatable',
                method: 'POST',
            },
        columns: [
                {
                    data: 'no',
                    className: 'text-center align-middle',
                    
                },
                {
                    data: 'mitra',
                    className: 'text-center align-middle',
                    
                },
                {
                    data: 'id_user',
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