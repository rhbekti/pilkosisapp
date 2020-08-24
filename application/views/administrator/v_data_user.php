<!-- Begin Page Content -->
<div class="container-fluid">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="h3 mb-4 text-gray-800"><?=$judul;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('/admin/Dashboard');?>">Beranda</a></li>
              <li class="breadcrumb-item active"><?=$judul ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body table-responsive">
                <table class="table table-hover" id="tbluser">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>jabatan</th>
                            <th>status</th>
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