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
     <!-- form tambah kandidat -->
     <div class="row">
         <div class="col-12 col-md-12 col-sm-12">
             <div class="card">
                 <div class="card-body">
                     <?= form_open_multipart('/admin/kandidat/simpan_bio'); ?>
                     <div class="form_group">
                         <label for="no">No Kandidat*</label>
                         <input type="number" name="nokandidat" id=no" class="form-control">
                         <small class="text-danger"><?= form_error('nokandidat'); ?></small>
                     </div>
                     <div class="row">
                         <div class="col-12 col-md-6">
                             <div class="form-group">
                                 <label for="nama">Nama</label>
                                 <input type="text" name="nama" id="nama" class="form-control">
                                 <small class="text-danger"><?= form_error('nama'); ?></small>
                             </div>
                         </div>
                         <div class="col-12 col-md-6">
                             <div class="form-group">
                                 <label for="buka">Tanggal Lahir</label>
                                 <div class="input-group date" id="tglmulaiform" data-target-input="nearest">
                                     <input type="text" name="tgllahir" class="form-control datetimepicker-input" data-target="#tglmulaiform" />
                                     <div class="input-group-append" data-target="#tglmulaiform" data-toggle="datetimepicker">
                                         <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                     </div>
                                 </div>
                                 <small class="text-danger"><?= form_error('tgllahir'); ?></small>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12 col-md-6">
                             <div class="form-group">
                                 <label for="kelas">Kelas</label>
                                 <select name="kelas" id="kelas" class="form-control">
                                     <option value="0">--pilih--</option>
                                     <?php foreach($rs_kelas as $row) { ?>
                                     <option value="<?=$row->kodekelas;?>"><?=$row->namakelas;?></option>
                                     <?php } ?>
                                 </select>
                                 <small class="text-danger"><?= form_error('kelas'); ?></small>
                             </div>
                             <div class="form-group">
                                 <label for="alamat">Alamat</label>
                                 <input type="text" name="alamat" id="alamat" class="form-control">
                                 <small class="text-danger"><?= form_error('alamat'); ?></small>
                             </div>
                             <div class="form-group">
                                 <label for="sosmed">Sosmed</label>
                                 <input type="text" name="sosmed" id="sosmed" class="form-control">
                                 <small class="text-danger"><?= form_error('sosmed'); ?></small>
                             </div>
                             <div class="form-group">
                                 <label for="gambar">Foto</label>
                                 <input type="file" name="gambar" id="gambar" class="form-control">
                             </div>
                         </div>
                         <div class="col-12 col-md-6">
                             <div class="form-group">
                                 <label for="riwayat">Riwayat Organisasi</label>
                                 <textarea name="riwayat" id="riwayat" cols="30" rows="5" class="form-control">
                            </textarea>
                                 <small class="text-danger"><?= form_error('riwayat'); ?></small>
                             </div>
                         </div>
                     </div>

                     <br>
                     <button type="button" class="btn btn-danger float-right" role="modal" data-target="#batal-simpan">Batal</button>
                     <button type="submit" name="simpan" class="btn btn-primary float-right mx-3">Simpan</button>
                     <?= form_close(); ?>
                 </div>
             </div>
         </div>

     </div>
 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->