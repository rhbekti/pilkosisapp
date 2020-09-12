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
    </div><!-- /.container-fluid -->
  </section>

  <!-- Content Row -->
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
      <div class="flashdata" data-aksi="<?= $this->session->flashdata('aksi'); ?>"></div>
           <div class="infoaksi" data-info="<?= $this->session->flashdata('info'); ?>"></div>
        <div class="card-header">
          <!-- Button trigger modal -->
          <?php 
          if($user['role'] == 'A'){ ?>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tbh-admin">
              Tambah Data
            </button>
           <?php } ?>
        </div>
        <div class="card-body">
          <table class="table table-hover" id="tblpetugas">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Level</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="tbh-admin" tabindex="-1" role="dialog" aria-labelledby="tbh-adminLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tbh-adminLabel">Tambah Data</h5>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('/admin/Petugas/tambah') ?>
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="level">Level</label>
          <select name="level" id="level" class="form-control">
            <option value="1">Administrator</option>
            <option value="6">Petugas</option>
          </select>
        </div>
        <div class="form-group">
          <label for="role">Hak Akses</label>
          <select name="role" id="role" class="form-control">
            <option value="C">hanya petugas</option>
            <option value="B">petugas osis</option>
            <option value="A">Full Akses</option>
          </select>
        </div>
        <div class="form-group">
          <label for="foto">Foto</label>
          <input type="file" name="foto" id="foto" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>


<!-- Modal hapus -->
<div class="modal fade" id="Modalhapus" tabindex="-1" role="dialog" aria-labelledby="ModalhapusLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Apakah yakin dihapus?
        <form action="<?=site_url('/admin/Petugas/delete');?>" method="post">
        <input type="hidden" name="idpetugashapus">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </form>
      </div>
    </div>
  </div>
</div>