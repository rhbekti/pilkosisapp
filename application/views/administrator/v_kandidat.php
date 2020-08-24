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
   <div class="row">
     <div class="col-12">
       <div class="card">
         <div class="card-header">
           <div class="flashdata" data-aksi="<?= $this->session->flashdata('aksi'); ?>"></div>
           <div class="infoaksi" data-info="<?= $this->session->flashdata('info'); ?>"></div>
           <a href="<?= site_url('/admin/Kandidat/add'); ?>" class="btn btn-primary float-right mt-3">Tambah Kandidat</a>
         </div>
         <div class="card-body table-responsive">
           <table class="table table-hover" id="tblkandidat">
             <thead>
               <tr>
                 <th>No</th>
                 <th>No Kandidat</th>
                 <th>Foto</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                 <th>Ketua</th>
                 <th>Wakil</th>
                 <th>Visi</th>
                 <th>Misi</th>
                 <th>Suara</th>
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
 <div class="modal fade" id="Modalhapus" tabindex="-1" role="dialog" aria-labelledby="judulmodal" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="judulmodal">Hapus Data</h5>
       </div>
       <div class="modal-body">
         <form action="<?= site_url('/admin/Kandidat/hapus'); ?>" method="post">
           <input type="hidden" name="no" id="no" required>
           <input type="hidden" name="foto" id="foto">
           Apakah yakin dihapus?
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
         <button type="submit" class="btn btn-danger">Hapus</button>
         </form>
       </div>
     </div>
   </div>
 </div>