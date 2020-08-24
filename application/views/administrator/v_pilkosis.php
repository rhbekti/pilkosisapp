<!-- Begin Page Content -->
<div class="container-fluid">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('/admin/Dashboard'); ?>">Beranda</a></li>
            <li class="breadcrumb-item active"><?= $judul ?></li>
          </ol>
        </div>
      </div>
    </div>
  </section>
<div class="row mb-4">
  <div class="col-12">
    <div class="card shadow">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>tgl Mulai</th>
              <th>tgl Akhir</th>
              <th>Jam Buka</th>
              <th>Jam Tutup</th>
              <th>Admin</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody id="list-setting">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

  <div class="row">
    <div class="col-12 col-md-6">
    <div class="flashdata" data-aksi="<?= $this->session->flashdata('aksi'); ?>"></div>
           <div class="infoaksi" data-info="<?= $this->session->flashdata('info'); ?>"></div>
      <form action="<?= site_url('/admin/Pilkosis/setting') ?>" method="post">
        <div class="card shadow">
          <div class="card-body">
            <div class="form-group">
              <label for="buka">Setting Tanggal Mulai</label>
              <div class="input-group date" id="tglmulaiform" data-target-input="nearest">
                <input type="text" name="tglmulai" class="form-control datetimepicker-input" data-target="#tglmulaiform" />
                <div class="input-group-append" data-target="#tglmulaiform" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="buka">Setting Tanggal Berakhir</label>
              <div class="input-group date" id="tgltutupform" data-target-input="nearest">
                <input type="text" name="tgltutup" class="form-control datetimepicker-input" data-target="#tgltutupform" />
                <div class="input-group-append" data-target="#tgltutupform" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-12 col-md-6">

      <div class="card shadow">
        <div class="card-body">
          <div class="form-group">
            <label for="buka">Setting Jam Buka</label>
            <div class="input-group date" id="jambukaform" data-target-input="nearest">
              <input type="text" name="jambuka" class="form-control datetimepicker-input" data-target="#jambukaform" />
              <div class="input-group-append" data-target="#jambukaform" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-clock"></i></div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="buka">Setting Jam Tutup</label>
            <div class="input-group date" id="jamtutupform" data-target-input="nearest">
              <input type="text" name="jamtutup" class="form-control datetimepicker-input" data-target="#jamtutupform" />
              <div class="input-group-append" data-target="#jamtutupform" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-clock"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 mt-4">
      <input type="hidden" name="idadmin" value="<?=$user['id'];?>">
      <button type="button" class="btn btn-danger float-right mr-3">Batal</button>
      <button type="submit" class="btn btn-success float-right mx-3">Simpan</button>
    </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->