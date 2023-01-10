
<?= $this->extend('Layout/wreaper'); ?>
<?= $this->section('content') ?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Referensi /</span> Tahun Pelajaran
</h4>
<div class="row m-1">
<!-- Complex Headers -->
              <div class="card card-action">
                <div class="card-header align-items-center">
                  <h5 class="card-action-title mb-0">Taun Pelajaran</h5>
                  <div class="card-action-element">
                    <button class="btn btn-primary btn-md" type="button" data-bs-toggle="modal" data-bs-target="#add"><i class="bx bx-plus bx-xs me-1"></i>Tambah Data</button>
                  </div>
                </div>
                <div class="card-datatable text-nowrap">
                  <table class="dt-complex-header table table-mgmp">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tahun Pelajaran</th>
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
                <form action="" method="POST" id="fmthnajar">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Tambah Tahun Pelajaran</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="tahun_ajar" class="form-label">Tahun Pelajaran</label>
                      <input type="text" id="tahun_ajar" name="tahun_ajar" class="form-control">
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
<?= $this->endSection() ?>>
<?= $this->section('css')?>
<?= $this->endSection() ?>
<?= $this->section('js') ?><script>
    var table;
    $(document).ready(function() {
        table = $(".table-mgmp").DataTable();
    });
</script>
<?= $this->endSection() ?>


          